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


    /**
     * Use this method to send text messages. On success, the sent \tgbot\Api\Types\Message is returned.
     *
     * @param int $chatId
     * @param string $text
     * @param bool $disablePreviw
     * @param int $replyToMessageId
     * @param \tgbot\Api\Types\ReplyKeyboardMarkup|\tgbot\Api\Types\ReplyKeyboardHide|\tgbot\Api\Types\ForceReply $replyMarkup
     *
     * @return \tgbot\Api\Types\Message
     * @throws \tgbot\Api\Exception
     */
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

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side.
     * The status is set for 5 seconds or less (when a message arrives from your bot,
     * Telegram clients clear its typing status).
     *
     * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
     *
     * Type of action to broadcast. Choose one, depending on what the user is about to receive:
     * `typing` for text messages, `upload_photo` for photos, `record_video` or `upload_video` for videos,
     * `record_audio` or upload_audio for audio files, `upload_document` for general files,
     * `find_location` for location data.
     *
     * @param int $chatId
     * @param string $action
     *
     * @return bool
     * @throws \tgbot\Api\Exception
     */
    public function sendChatAction($chatId, $action)
    {
        return $this->call('sendChatAction', [
            'chat_id' => (int) $chatId,
            'action' => $action
        ]);
    }

    /**
     * Use this method to get a list of profile pictures for a user.
     *
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return \tgbot\Api\Types\UserProfilePhotos
     * @throws \tgbot\Api\Exception
     */
    public function getUserProfilePhotos($userId, $offset = 0, $limit = 100)
    {
        return $this->call('getUserProfilePhotos', [
            'user_id' => (int) $userId,
            'offset' => $offset,
            'limit' => $limit
        ]);
    }

    /**
     * Use this method to specify a url and receive incoming updates via an outgoing webhook.
     * Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url,
     * containing a JSON-serialized Update.
     * In case of an unsuccessful request, we will give up after a reasonable amount of attempts.
     *
     * @param string $url HTTPS url to send updates to. Use an empty string to remove webhook integration
     *
     * @return \tgbot\Api\Types\UserProfilePhotos
     * @throws \tgbot\Api\Exception
     */
    public function setWebhook($url = '')
    {
        return $this->call('setWebhook', [
            'url' => $url
        ]);
    }

    /**
     * A simple method for testing your bot's auth token.Requires no parameters.
     * Returns basic information about the bot in form of a User object.
     *
     * @return \tgbot\Api\Types\User
     * @throws \tgbot\Api\Exception
     * @throws \tgbot\Api\InvalidArgumentException
     */
    public function getMe()
    {
        return $this->call('getMe');
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

    /**
     * @return string
     */
    public function getUrl()
    {
        return self::URL_PREFIX . $this->token;
    }

}