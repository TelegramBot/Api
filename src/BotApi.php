<?php

namespace tgbot\Api;

class BotApi
{
    /**
     * Url prefix
     */
    const URL_PREFIX = 'https://api.telegram.org/bot';

    /**
     * @var
     */
    protected $curl;

    /**
     * Bot token
     *
     * @var string
     */
    protected $token;

    /**
     * Check whether return associative array
     *
     * @var bool
     */
    protected $returnArray = true;

    /**
     * Constructor
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->curl = curl_init();
        $this->token = $token;
    }

    /**
     * Set return array
     *
     * @param bool $mode
     *
     * @return $this
     */
    public function setModeObject($mode = true)
    {
        $this->returnArray = !$mode;

        return $this;
    }

    /**
     * Call method
     *
     * @param string $method
     * @param array $data
     *
     * @return mixed
     */
    public function call($method, array $data = null)
    {
        $options = [
            CURLOPT_URL => $this->getUrl() . '/' . $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => null,
            CURLOPT_POSTFIELDS => null
        ];

        if ($data) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = http_build_query($data);
        }

        curl_setopt_array($this->curl, $options);

        $response = json_decode(curl_exec($this->curl), $this->returnArray);

        if ($this->returnArray) {
            if (!$response['ok']) {
                throw new Exception($response['description'], $response['error_code']);
            }

            return $response['result'];
        }

        if (!$response->ok) {
            throw new Exception($response->description, $response->error_code);
        }

        return $response->result;
    }


    public function sendMessage($chatId, $text, $disablePreviw = false, $replyToMessageId = null, $replyMarkup = null)
    {
        return $this->call('sendMessage', [
            'chat_id' => (int) $chatId,
            'text' => $text,
            'disable_web_page_preview' => $disablePreviw,
            'reply_to_message_id' => (int) $replyToMessageId,
            'reply_markup' => $replyMarkup
        ]);
    }

    public function sendChatAction($chatId, $action) {
        return $this->call('sendChatAction', [
            'chat_id' => (int) $chatId,
            'action' => $action
        ]);
    }

    public function getUserProfilePhotos($userId, $offset = 0, $limit = 100) {
        return $this->call('getUserProfilePhotos', [
            'user_id' => (int) $userId,
            'offset' => $offset,
            'limit' => $limit
        ]);
    }

    /**
     * Or use that
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return $this->call($name, $arguments ? $arguments[0] : null);
    }


    /**
     * Close curl
     */
    public function __destruct()
    {
        $this->curl and curl_close($this->curl);
    }

    public function getUrl()
    {
        return self::URL_PREFIX . $this->token;
    }

}