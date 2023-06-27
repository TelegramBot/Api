<?php

namespace TelegramBot\Api;

use TelegramBot\Api\Types\Message;

/**
 * @deprecated
 * @psalm-suppress all
 */
class Botan
{
    /**
     * @var string Tracker url
     */
    const BASE_URL = 'https://api.botan.io/track';

    /**
     * CURL object
     *
     * @var resource
     */
    protected $curl;

    /**
     * Yandex AppMetrica application api_key
     *
     * @var string
     */
    protected $token;

    /**
     * Botan constructor
     *
     * @param string $token
     *
     * @throws \Exception
     */
    public function __construct($token)
    {
        if (!function_exists('curl_version')) {
            throw new Exception('CURL not installed');
        }

        if (empty($token)) {
            throw new InvalidArgumentException('Token should not be empty');
        }

        $this->token = $token;
        $this->curl = curl_init();
    }

    /**
     * Event tracking
     *
     * @param \TelegramBot\Api\Types\Message $message
     * @param string $eventName
     *
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\HttpException
     *
     * @return void
     */
    public function track(Message $message, $eventName = 'Message')
    {
        $uid = $message->getFrom()->getId();

        $options = [
            CURLOPT_URL => self::BASE_URL . "?token={$this->token}&uid={$uid}&name={$eventName}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => $message->toJson(),
            CURLOPT_TIMEOUT => 5,
        ];

        curl_setopt_array($this->curl, $options);
        /** @var string $response */
        $response = curl_exec($this->curl);
        /** @var array $result */
        $result = BotApi::jsonValidate($response, true);

        BotApi::curlValidate($this->curl);

        if ($result['status'] !== 'accepted') {
            throw new Exception('Error Processing Request');
        }
    }

    /**
     * Destructor. Close curl
     */
    public function __destruct()
    {
        $this->curl && curl_close($this->curl);
    }
}
