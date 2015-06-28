<?php

namespace TelegramBot\Api;

use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\User;
use TelegramBot\Api\Types\UserProfilePhotos;

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
        $options = array(
            CURLOPT_URL => $this->getUrl() . '/' . $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => null,
            CURLOPT_POSTFIELDS => null
        );

        if ($data) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
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
     * Use this method to send text messages. On success, the sent \TelegramBot\Api\Types\Message is returned.
     *
     * @param int $chatId
     * @param string $text
     * @param bool $disablePreviw
     * @param int|null $replyToMessageId
     * @param \TelegramBot\Api\Types\ReplyKeyboardMarkup|\TelegramBot\Api\Types\ReplyKeyboardHide|\TelegramBot\Api\Types\ForceReply|null $replyMarkup
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\Exception
     */
    public function sendMessage($chatId, $text, $disablePreviw = false, $replyToMessageId = null, $replyMarkup = null)
    {
        return Message::fromResponse($this->call('sendMessage', array(
            'chat_id' => (int) $chatId,
            'text' => $text,
            'disable_web_page_preview' => $disablePreviw,
            'reply_to_message_id' => (int) $replyToMessageId,
            'reply_markup' => $replyMarkup
        )));
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
     * @throws \TelegramBot\Api\Exception
     */
    public function sendChatAction($chatId, $action)
    {
        return $this->call('sendChatAction', array(
            'chat_id' => (int) $chatId,
            'action' => $action
        ));
    }

    /**
     * Use this method to get a list of profile pictures for a user.
     *
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return \TelegramBot\Api\Types\UserProfilePhotos
     * @throws \TelegramBot\Api\Exception
     */
    public function getUserProfilePhotos($userId, $offset = 0, $limit = 100)
    {
        return UserProfilePhotos::fromResponse($this->call('getUserProfilePhotos', array(
            'user_id' => (int) $userId,
            'offset' => (int) $offset,
            'limit' => (int) $limit,
        )));
    }

    /**
     * Use this method to specify a url and receive incoming updates via an outgoing webhook.
     * Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url,
     * containing a JSON-serialized Update.
     * In case of an unsuccessful request, we will give up after a reasonable amount of attempts.
     *
     * @param string $url HTTPS url to send updates to. Use an empty string to remove webhook integration
     *
     * @return \TelegramBot\Api\Types\UserProfilePhotos
     * @throws \TelegramBot\Api\Exception
     */
    public function setWebhook($url = '')
    {
        return $this->call('setWebhook', array('url' => $url));
    }

    /**
     * A simple method for testing your bot's auth token.Requires no parameters.
     * Returns basic information about the bot in form of a User object.
     *
     * @return \TelegramBot\Api\Types\User
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public function getMe()
    {
        return User::fromResponse($this->call('getMe'));
    }

    /**
     * Use this method to receive incoming updates using long polling.
     * An Array of Update objects is returned.
     *
     * Notes
     * 1. This method will not work if an outgoing webhook is set up.
     * 2. In order to avoid getting duplicate updates, recalculate offset after each server response.
     *
     * @param int $offset
     * @param int $limit
     * @param int $timeout
     *
     * @return array
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public function getUpdates($offset = 0, $limit = 100, $timeout = 0)
    {
        $responseRaw = $this->call('getUpdates', array(
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout
        ));
        $response = array();
        foreach ($responseRaw as $raw) {
            $response[] = array('update_id' => $raw['update_id'], 'message' => Message::fromResponse($raw['message']));
        }

        return $response;
    }

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * @param int $chatId
     * @param float $latitude
     * @param float $longitude
     * @param int|null $replyToMessageId
     * @param \TelegramBot\Api\Types\ReplyKeyboardMarkup|\TelegramBot\Api\Types\ReplyKeyboardHide|\TelegramBot\Api\Types\ForceReply|null $replyMarkup
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\Exception
     */
    public function sendLocation($chatId, $latitude, $longitude, $replyToMessageId = null, $replyMarkup = null)
    {
        return Message::fromResponse($this->call('sendLocation', array(
            'chat_id' => (int) $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => $replyMarkup
        )));
    }

    /**
     * Use this method to send .webp stickers. On success, the sent Message is returned.
     *
     * @param int $chatId
     * @param \TelegramBot\Api\Types\InputFile|string $sticker
     * @param int|null $replyToMessageId
     * @param \TelegramBot\Api\Types\ReplyKeyboardMarkup|\TelegramBot\Api\Types\ReplyKeyboardHide|\TelegramBot\Api\Types\ForceReply|null $replyMarkup
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\InvalidArgumentException
     * @throws \TelegramBot\Api\Exception
     */
    public function sendSticker($chatId, $sticker, $replyToMessageId = null, $replyMarkup = null)
    {
        return Message::fromResponse($this->call('sendSticker', array(
            'chat_id' => (int) $chatId,
            'sticker' => $sticker,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => $replyMarkup
        )));
    }

    /**
     * Use this method to send video files,
     * Telegram clients support mp4 videos (other formats may be sent as Document).
     * On success, the sent Message is returned.
     *
     * @param int $chatId
     * @param \TelegramBot\Api\Types\InputFile|string $video
     * @param int|null $replyToMessageId
     * @param \TelegramBot\Api\Types\ReplyKeyboardMarkup|\TelegramBot\Api\Types\ReplyKeyboardHide|\TelegramBot\Api\Types\ForceReply|null $replyMarkup
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\InvalidArgumentException
     * @throws \TelegramBot\Api\Exception
     */
    public function sendVideo($chatId, $video, $replyToMessageId = null, $replyMarkup = null)
    {
        return Message::fromResponse($this->call('sendVideo', array(
            'chat_id' => (int) $chatId,
            'video' => $video,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => $replyMarkup
        )));
    }


    /**
     * Use this method to forward messages of any kind. On success, the sent Message is returned.
     *
     * @param int $chatId
     * @param int $fromChatId
     * @param int $messageId
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\InvalidArgumentException
     * @throws \TelegramBot\Api\Exception
     */
    public function forwardMessage($chatId, $fromChatId, $messageId)
    {
        return Message::fromResponse($this->call('forwardMessage', array(
            'chat_id' => (int) $chatId,
            'from_chat_id' => (int) $fromChatId,
            'message_id' => (int) $messageId,
        )));
    }

    /**
     * Use this method to send audio files,
     * if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .ogg file encoded with OPUS (other formats may be sent as Document).
     * On success, the sent Message is returned.
     *
     * @param int $chatId
     * @param \TelegramBot\Api\Types\InputFile|string $audio
     * @param int|null $replyToMessageId
     * @param \TelegramBot\Api\Types\ReplyKeyboardMarkup|\TelegramBot\Api\Types\ReplyKeyboardHide|\TelegramBot\Api\Types\ForceReply|null $replyMarkup
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\InvalidArgumentException
     * @throws \TelegramBot\Api\Exception
     */
    public function sendAudio($chatId, $audio, $replyToMessageId = null, $replyMarkup = null)
    {
        return Message::fromResponse($this->call('sendAudio', array(
            'chat_id' => (int) $chatId,
            'audio' => $audio,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => $replyMarkup
        )));
    }

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     *
     * @param int $chatId
     * @param \TelegramBot\Api\Types\InputFile|string $photo
     * @param string|null $caption
     * @param int|null $replyToMessageId
     * @param \TelegramBot\Api\Types\ReplyKeyboardMarkup|\TelegramBot\Api\Types\ReplyKeyboardHide|\TelegramBot\Api\Types\ForceReply|null $replyMarkup
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\InvalidArgumentException
     * @throws \TelegramBot\Api\Exception
     */
    public function sendPhoto($chatId, $photo, $caption = null, $replyToMessageId = null, $replyMarkup = null)
    {
        return Message::fromResponse($this->call('sendPhoto', array(
            'chat_id' => (int) $chatId,
            'photo' => $photo,
            'caption' => $caption,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => $replyMarkup
        )));
    }

    /**
     * Use this method to send general files. On success, the sent Message is returned.
     * Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int $chatId
     * @param \TelegramBot\Api\Types\InputFile|string $document
     * @param int|null $replyToMessageId
     * @param \TelegramBot\Api\Types\ReplyKeyboardMarkup|\TelegramBot\Api\Types\ReplyKeyboardHide|\TelegramBot\Api\Types\ForceReply|null $replyMarkup
     *
     * @return \TelegramBot\Api\Types\Message
     * @throws \TelegramBot\Api\InvalidArgumentException
     * @throws \TelegramBot\Api\Exception
     */
    public function sendDocument($chatId, $document, $replyToMessageId = null, $replyMarkup = null)
    {
        return Message::fromResponse($this->call('sendDocument', array(
            'chat_id' => (int) $chatId,
            'document' => $document,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => $replyMarkup
        )));
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
