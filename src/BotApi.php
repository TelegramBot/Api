<?php

namespace TelegramBot\Api;

use TelegramBot\Api\Types\ArrayOfBotCommand;
use TelegramBot\Api\Types\ArrayOfChatMemberEntity;
use TelegramBot\Api\Types\ArrayOfMessageEntity;
use TelegramBot\Api\Types\ArrayOfMessages;
use TelegramBot\Api\Types\ArrayOfSticker;
use TelegramBot\Api\Types\ArrayOfUpdates;
use TelegramBot\Api\Types\BotCommand;
use TelegramBot\Api\Types\Chat;
use TelegramBot\Api\Types\ChatMember;
use TelegramBot\Api\Types\File;
use TelegramBot\Api\Types\ForceReply;
use TelegramBot\Api\Types\ForumTopic;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\QueryResult\AbstractInlineQueryResult;
use TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia;
use TelegramBot\Api\Types\InputMedia\InputMedia;
use TelegramBot\Api\Types\MaskPosition;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\MessageId;
use TelegramBot\Api\Types\Poll;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use TelegramBot\Api\Types\ReplyKeyboardRemove;
use TelegramBot\Api\Types\SentWebAppMessage;
use TelegramBot\Api\Types\Sticker;
use TelegramBot\Api\Types\StickerSet;
use TelegramBot\Api\Types\Update;
use TelegramBot\Api\Types\User;
use TelegramBot\Api\Types\UserProfilePhotos;
use TelegramBot\Api\Types\WebhookInfo;

/**
 * Class BotApi
 *
 * @package TelegramBot\Api
 */
class BotApi
{
    /**
     * HTTP codes
     *
     * @var array
     */
    public static $codes = [
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
        // Success 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',          // RFC4918
        208 => 'Already Reported',      // RFC5842
        226 => 'IM Used',               // RFC3229
        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found', // 1.1
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        // 306 is deprecated but reserved
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',    // RFC7238
        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        422 => 'Unprocessable Entity',                                        // RFC4918
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
        426 => 'Upgrade Required',                                            // RFC2817
        428 => 'Precondition Required',                                       // RFC6585
        429 => 'Too Many Requests',                                           // RFC6585
        431 => 'Request Header Fields Too Large',                             // RFC6585
        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates (Experimental)',                      // RFC2295
        507 => 'Insufficient Storage',                                        // RFC4918
        508 => 'Loop Detected',                                               // RFC5842
        510 => 'Not Extended',                                                // RFC2774
        511 => 'Network Authentication Required',                             // RFC6585
    ];

    /**
     * @var array
     */
    private $proxySettings = [];

    /**
     * Default http status code
     */
    const DEFAULT_STATUS_CODE = 200;

    /**
     * Not Modified http status code
     */
    const NOT_MODIFIED_STATUS_CODE = 304;

    /**
     * Limits for tracked ids
     */
    const MAX_TRACKED_EVENTS = 200;

    /**
     * Url prefixes
     */
    const URL_PREFIX = 'https://api.telegram.org/bot';

    /**
     * Url prefix for files
     */
    const FILE_URL_PREFIX = 'https://api.telegram.org/file/bot';

    /**
     * CURL object
     *
     * @var resource
     */
    protected $curl;

    /**
     * CURL custom options
     *
     * @var array
     */
    protected $customCurlOptions = [];

    /**
     * Bot token
     *
     * @var string
     */
    protected $token;

    /**
     * Botan tracker
     *
     * @var Botan|null
     */
    protected $tracker;

    /**
     * list of event ids
     *
     * @var array
     */
    protected $trackedEvents = [];

    /**
     * Check whether return associative array
     *
     * @var bool
     */
    protected $returnArray = true;

    /**
     * Constructor
     *
     * @param string $token Telegram Bot API token
     * @param string|null $trackerToken Yandex AppMetrica application api_key
     * @throws \Exception
     */
    public function __construct($token, $trackerToken = null)
    {
        $this->curl = curl_init();
        $this->token = $token;

        if ($trackerToken) {
            @trigger_error(sprintf('Passing $trackerToken to %s is deprecated', self::class), \E_USER_DEPRECATED);
            $this->tracker = new Botan($trackerToken);
        }
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
     * @param array|null $data
     * @param int $timeout
     *
     * @return mixed
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function call($method, array $data = null, $timeout = 10)
    {
        $options = $this->proxySettings + [
            CURLOPT_URL => $this->getUrl().'/'.$method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => null,
            CURLOPT_POSTFIELDS => null,
            CURLOPT_TIMEOUT => $timeout,
        ];

        if ($data) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
        }

        if (!empty($this->customCurlOptions)) {
            $options = $this->customCurlOptions + $options;
        }

        $response = self::jsonValidate($this->executeCurl($options), $this->returnArray);

        if (\is_array($response)) {
            if (!isset($response['ok']) || !$response['ok']) {
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
     * curl_exec wrapper for response validation
     *
     * @param array $options
     *
     * @return string
     *
     * @throws HttpException
     */
    protected function executeCurl(array $options)
    {
        curl_setopt_array($this->curl, $options);

        /** @var string|false $result */
        $result = curl_exec($this->curl);
        self::curlValidate($this->curl, $result);
        if ($result === false) {
            throw new HttpException(curl_error($this->curl), curl_errno($this->curl));
        }

        return $result;
    }

    /**
     * Response validation
     *
     * @param resource $curl
     * @param string|false|null $response
     *
     * @throws HttpException
     *
     * @return void
     */
    public static function curlValidate($curl, $response = null)
    {
        if ($response) {
            $json = json_decode($response, true) ?: [];
        } else {
            $json = [];
        }
        if (($httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE))
            && !in_array($httpCode, [self::DEFAULT_STATUS_CODE, self::NOT_MODIFIED_STATUS_CODE])
        ) {
            $errorDescription = array_key_exists('description', $json) ? $json['description'] : self::$codes[$httpCode];
            $errorParameters = array_key_exists('parameters', $json) ? $json['parameters'] : [];
            throw new HttpException($errorDescription, $httpCode, null, $errorParameters);
        }
    }

    /**
     * JSON validation
     *
     * @param string $jsonString
     * @param bool $asArray
     *
     * @return object|array
     * @throws InvalidJsonException
     */
    public static function jsonValidate($jsonString, $asArray)
    {
        $json = json_decode($jsonString, $asArray);

        if (json_last_error() != JSON_ERROR_NONE) {
            throw new InvalidJsonException(json_last_error_msg(), json_last_error());
        }

        return $json;
    }

    /**
     * Use this method to send text messages. On success, the sent \TelegramBot\Api\Types\Message is returned.
     *
     * @param int|float|string $chatId
     * @param string $text
     * @param string|null $parseMode
     * @param bool $disablePreview
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendMessage(
        $chatId,
        $text,
        $parseMode = null,
        $disablePreview = false,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null
    ) {
        return Message::fromResponse($this->call('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
            'message_thread_id' => $messageThreadId,
            'parse_mode' => $parseMode,
            'disable_web_page_preview' => $disablePreview,
            'reply_to_message_id' => (int) $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
    }

    /**
     * @param int|string $chatId
     * @param int|string $fromChatId
     * @param int $messageId
     * @param string|null $caption
     * @param string|null $parseMode
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param bool $disableNotification
     * @param int|null $replyToMessageId
     * @param bool $allowSendingWithoutReply
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     *
     * @return MessageId
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function copyMessage(
        $chatId,
        $fromChatId,
        $messageId,
        $caption = null,
        $parseMode = null,
        $captionEntities = null,
        $disableNotification = false,
        $replyToMessageId = null,
        $allowSendingWithoutReply = false,
        $replyMarkup = null,
        $messageThreadId = null,
        $protectContent = null
    ) {
        return MessageId::fromResponse($this->call('copyMessage', [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => (int) $messageId,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'disable_notification' => (bool) $disableNotification,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => (int) $replyToMessageId,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'protect_content' => (bool) $protectContent,
        ]));
    }

    /**
     * Use this method to send phone contacts
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param string $phoneNumber
     * @param string $firstName
     * @param string $lastName
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     *
     * @return Message
     * @throws Exception
     */
    public function sendContact(
        $chatId,
        $phoneNumber,
        $firstName,
        $lastName = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null
    ) {
        return Message::fromResponse($this->call('sendContact', [
            'chat_id' => $chatId,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
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
     * @throws Exception
     */
    public function sendChatAction($chatId, $action)
    {
        return $this->call('sendChatAction', [
            'chat_id' => $chatId,
            'action' => $action,
        ]);
    }

    /**
     * Use this method to get a list of profile pictures for a user.
     *
     * @param int $userId
     * @param int $offset
     * @param int $limit
     *
     * @return UserProfilePhotos
     * @throws Exception
     */
    public function getUserProfilePhotos($userId, $offset = 0, $limit = 100)
    {
        return UserProfilePhotos::fromResponse($this->call('getUserProfilePhotos', [
            'user_id' => (int) $userId,
            'offset' => (int) $offset,
            'limit' => (int) $limit,
        ]));
    }

    /**
     * Use this method to specify a url and receive incoming updates via an outgoing webhook.
     * Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url,
     * containing a JSON-serialized Update.
     * In case of an unsuccessful request, we will give up after a reasonable amount of attempts.
     *
     * @param string $url HTTPS url to send updates to. Use an empty string to remove webhook integration
     * @param \CURLFile|string $certificate Upload your public key certificate
     *                                      so that the root certificate in use can be checked
     * @param string|null $ipAddress The fixed IP address which will be used to send webhook requests
     *                               instead of the IP address resolved through DNS
     * @param int|null $maxConnections The maximum allowed number of simultaneous HTTPS connections to the webhook
     *                                 for update delivery, 1-100. Defaults to 40. Use lower values to limit
     *                                 the load on your bot's server, and higher values to increase your bot's throughput.
     * @param array|string|null $allowedUpdates A JSON-serialized list of the update types you want your bot to receive.
     *                                          For example, specify [“message”, “edited_channel_post”, “callback_query”]
     *                                          to only receive updates of these types. See Update for a complete list of available update types.
     *                                          Specify an empty list to receive all update types except chat_member (default).
     *                                          If not specified, the previous setting will be used.
     *                                          Please note that this parameter doesn't affect updates created before the call to the setWebhook,
     *                                          so unwanted updates may be received for a short period of time.
     * @param bool|null $dropPendingUpdates Pass True to drop all pending updates
     * @param string|null $secretToken A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request,
     *                                 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed.
     *                                 The header is useful to ensure that the request comes from a webhook set by you.
     *
     * @return string
     *
     * @throws Exception
     */
    public function setWebhook(
        $url = '',
        $certificate = null,
        $ipAddress = null,
        $maxConnections = 40,
        $allowedUpdates = null,
        $dropPendingUpdates = false,
        $secretToken = null
    ) {
        return $this->call('setWebhook', [
            'url' => $url,
            'certificate' => $certificate,
            'ip_address' => $ipAddress,
            'max_connections' => $maxConnections,
            'allowed_updates' => \is_array($allowedUpdates) ? json_encode($allowedUpdates) : $allowedUpdates,
            'drop_pending_updates' => $dropPendingUpdates,
            'secret_token' => $secretToken
        ]);
    }

    /**
     * Use this method to clear webhook and use getUpdates again!
     *
     * @param bool $dropPendingUpdates Pass True to drop all pending updates
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function deleteWebhook($dropPendingUpdates = false)
    {
        return $this->call('deleteWebhook', ['drop_pending_updates' => $dropPendingUpdates]);
    }

    /**
     * Use this method to get current webhook status. Requires no parameters.
     * On success, returns a WebhookInfo object. If the bot is using getUpdates,
     * will return an object with the url field empty.
     *
     * @return WebhookInfo
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public function getWebhookInfo()
    {
        return WebhookInfo::fromResponse($this->call('getWebhookInfo'));
    }

    /**
     * A simple method for testing your bot's auth token.Requires no parameters.
     * Returns basic information about the bot in form of a User object.
     *
     * @return User
     * @throws Exception
     * @throws InvalidArgumentException
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
     * @return Update[]
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public function getUpdates($offset = 0, $limit = 100, $timeout = 0)
    {
        $updates = ArrayOfUpdates::fromResponse($this->call('getUpdates', [
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout,
        ]));

        if ($this->tracker instanceof Botan) {
            foreach ($updates as $update) {
                $this->trackUpdate($update);
            }
        }

        return $updates;
    }

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * @param int|string $chatId
     * @param float $latitude
     * @param float $longitude
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param null|int $livePeriod
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     *
     * @return Message
     *
     * @throws Exception
     */
    public function sendLocation(
        $chatId,
        $latitude,
        $longitude,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $livePeriod = null,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null
    ) {
        return Message::fromResponse($this->call('sendLocation', [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'live_period' => $livePeriod,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
    }

    /**
     * Use this method to edit live location messages sent by the bot or via the bot (for inline bots).
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param string $inlineMessageId
     * @param float $latitude
     * @param float $longitude
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     *
     * @return Message|true
     *
     * @throws Exception
     */
    public function editMessageLiveLocation(
        $chatId,
        $messageId,
        $inlineMessageId,
        $latitude,
        $longitude,
        $replyMarkup = null
    ) {
        $response = $this->call('editMessageLiveLocation', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to stop updating a live location message sent by the bot or via the bot (for inline bots) before
     * live_period expires.
     * On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param string $inlineMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     *
     * @return Message|true
     *
     * @throws Exception
     */
    public function stopMessageLiveLocation(
        $chatId,
        $messageId,
        $inlineMessageId,
        $replyMarkup = null
    ) {
        $response = $this->call('stopMessageLiveLocation', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to send information about a venue. On success, the sent Message is returned.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquareId
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     *
     * @return Message
     * @throws Exception
     */
    public function sendVenue(
        $chatId,
        $latitude,
        $longitude,
        $title,
        $address,
        $foursquareId = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null
    ) {
        return Message::fromResponse($this->call('sendVenue', [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'foursquare_id' => $foursquareId,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
    }

    /**
     * Use this method to send .webp stickers. On success, the sent Message is returned.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|string $sticker
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param bool $allowSendingWithoutReply Pass True if the message should be sent even if the specified replied-to message is not found
     * @param string|null $messageThreadId
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendSticker(
        $chatId,
        $sticker,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $protectContent = false,
        $allowSendingWithoutReply = false,
        $messageThreadId = null
    ) {
        return Message::fromResponse($this->call('sendSticker', [
            'chat_id' => $chatId,
            'sticker' => $sticker,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
    }

    /**
     * @param string $name Name of the sticker set
     * @return StickerSet
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function getStickerSet($name)
    {
        return StickerSet::fromResponse($this->call('getStickerSet', [
            'name' => $name,
        ]));
    }

    /**
     * @param array[] $customEmojiIds List of custom emoji identifiers.
     *                                At most 200 custom emoji identifiers can be specified.
     * @return StickerSet
     * @throws InvalidArgumentException
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function getCustomEmojiStickers($customEmojiIds = [])
    {
        return StickerSet::fromResponse($this->call('getCustomEmojiStickers', [
            'custom_emoji_ids' => $customEmojiIds,
        ]));
    }

    /**
     * Use this method to create a new sticker set owned by a user.
     * The bot will be able to edit the sticker set thus created.
     * You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker.
     * Returns True on success.
     *
     * @param int $userId User identifier of created sticker set owner
     * @param string $pngSticker PNG image with the sticker, must be up to 512 kilobytes in size,
     *                           dimensions must not exceed 512px, and either width or height must be exactly 512px.
     *
     * @return File
     *
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function uploadStickerFile($userId, $pngSticker)
    {
        return File::fromResponse($this->call('uploadStickerFile', [
            'user_id' => $userId,
            'png_sticker' => $pngSticker,
        ]));
    }

    /**
     * Use this method to create a new sticker set owned by a user.
     * The bot will be able to edit the sticker set thus created.
     * You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker. Returns True on success.
     *
     * @param int $userId User identifier of created sticker set owner
     * @param string $name Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals).
     *                     Can contain only english letters, digits and underscores. Must begin with a letter,
     *                     can't contain consecutive underscores and must end in “_by_<bot username>”.
     *                     <bot_username> is case insensitive. 1-64 characters.
     * @param string $title Sticker set title, 1-64 characters
     * @param string $pngSticker PNG image with the sticker, must be up to 512 kilobytes in size,
     *                           dimensions must not exceed 512px, and either width or height must be exactly 512px.
     *                           Pass a file_id as a String to send a file that already exists on the Telegram servers,
     *                           pass an HTTP URL as a String for Telegram to get a file from the Internet,
     *                           or upload a new one using multipart/form-data.
     * @param string $tgsSticker TGS animation with the sticker, uploaded using multipart/form-data.
     *                           See https://core.telegram.org/animated_stickers#technical-requirements for technical requirements
     * @param string $webmSticker WebP animation with the sticker, uploaded using multipart/form-data.
     *                            See https://core.telegram.org/animated_stickers#technical-requirements for technical requirements
     * @param string $stickerType Sticker type, one of “png”, “tgs”, or “webp”
     * @param string $emojis One or more emoji corresponding to the sticker
     * @param MaskPosition|null $maskPosition A JSON-serialized object for position where the mask should be placed on faces
     * @param array<string, \CURLFile|\CURLStringFile> $attachments Attachments to use in attach://<attachment>
     *
     * @throws InvalidArgumentException
     * @throws Exception
     *
     * @return bool
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function createNewStickerSet(
        $userId,
        $name,
        $title,
        $emojis,
        $pngSticker,
        $tgsSticker = null,
        $webmSticker = null,
        $stickerType = null,
        $maskPosition = null,
        $attachments = []
    ) {
        return $this->call('createNewStickerSet', [
            'user_id' => $userId,
            'name' => $name,
            'title' => $title,
            'png_sticker' => $pngSticker,
            'tgs_sticker' => $tgsSticker,
            'webm_sticker' => $webmSticker,
            'sticker_type' => $stickerType,
            'emojis' => $emojis,
            'mask_position' => is_null($maskPosition) ? $maskPosition : $maskPosition->toJson(),
        ] + $attachments);
    }

    /**
     * Use this method to add a new sticker to a set created by the bot.
     * You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker.
     * Animated stickers can be added to animated sticker sets and only to them.
     * Animated sticker sets can have up to 50 stickers.
     * Static sticker sets can have up to 120 stickers. Returns True on success.
     *
     * @param string $userId
     * @param string $name
     * @param string $emojis
     * @param string $pngSticker
     * @param string|null $tgsSticker
     * @param string|null $webmSticker
     * @param MaskPosition|null $maskPosition
     * @param array<string, \CURLFile|\CURLStringFile> $attachments Attachments to use in attach://<attachment>
     *
     * @return bool
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function addStickerToSet(
        $userId,
        $name,
        $emojis,
        $pngSticker,
        $tgsSticker = null,
        $webmSticker = null,
        $maskPosition = null,
        $attachments = []
    ) {
        return $this->call('addStickerToSet', [
            'user_id' => $userId,
            'name' => $name,
            'png_sticker' => $pngSticker,
            'tgs_sticker' => $tgsSticker,
            'webm_sticker' => $webmSticker,
            'emojis' => $emojis,
            'mask_position' => is_null($maskPosition) ? $maskPosition : $maskPosition->toJson(),
        ] + $attachments);
    }

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position.
     * Returns True on success.
     *
     * @param string $sticker File identifier of the sticker
     * @param int $position New sticker position in the set, zero-based
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function setStickerPositionInSet($sticker, $position)
    {
        return $this->call('setStickerPositionInSet', [
            'sticker' => $sticker,
            'position' => $position,
        ]);
    }

    /**
     * Use this method to delete a sticker from a set created by the bot.
     * Returns True on success.
     *
     * @param string $name Sticker set name
     * @param string $userId User identifier of sticker set owner
     * @param File|null $thumbnail A PNG image with the thumbnail,
     *                             must be up to 128 kilobytes in size and have width and height exactly 100px,
     *                             or a TGS animation with the thumbnail up to 32 kilobytes in size
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function setStickerSetThumbnail($name, $userId, $thumbnail = null)
    {
        return $this->call('setStickerSetThumb', [
            'name' => $name,
            'user_id' => $userId,
            'thumbnail' => $thumbnail,
        ]);
    }

    /**
     * @deprecated Use setStickerSetThumbnail
     *
     * Use this method to delete a sticker from a set created by the bot.
     * Returns True on success.
     *
     * @param string $name Sticker set name
     * @param string $userId User identifier of sticker set owner
     * @param File|null $thumb A PNG image with the thumbnail,
     *                         must be up to 128 kilobytes in size and have width and height exactly 100px,
     *                         or a TGS animation with the thumbnail up to 32 kilobytes in size
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function setStickerSetThumb($name, $userId, $thumb = null)
    {
        return $this->setStickerSetThumbnail($name, $userId, $thumb);
    }

    /**
     * Use this method to send video files,
     * Telegram clients support mp4 videos (other formats may be sent as Document).
     * On success, the sent Message is returned.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|string $video
     * @param int|null $duration
     * @param string|null $caption
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param bool $supportsStreaming Pass True, if the uploaded video is suitable for streaming
     * @param string|null $parseMode
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     * @param \CURLFile|\CURLStringFile|string|null $thumbnail
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendVideo(
        $chatId,
        $video,
        $duration = null,
        $caption = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $supportsStreaming = false,
        $parseMode = null,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null,
        $thumbnail = null
    ) {
        return Message::fromResponse($this->call('sendVideo', [
            'chat_id' => $chatId,
            'video' => $video,
            'duration' => $duration,
            'caption' => $caption,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'supports_streaming' => (bool) $supportsStreaming,
            'parse_mode' => $parseMode,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
            'thumbnail' => $thumbnail,
        ]));
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound),
     * On success, the sent Message is returned.
     * Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|string $animation
     * @param int|null $duration
     * @param string|null $caption
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param string|null $parseMode,
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     * @param \CURLFile|\CURLStringFile|string|null $thumbnail
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendAnimation(
        $chatId,
        $animation,
        $duration = null,
        $caption = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $parseMode = null,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null,
        $thumbnail = null
    ) {
        return Message::fromResponse($this->call('sendAnimation', [
            'chat_id' => $chatId,
            'animation' => $animation,
            'duration' => $duration,
            'caption' => $caption,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'parse_mode' => $parseMode,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
            'thumbnail' => $thumbnail,
        ]));
    }

    /**
     * Use this method to send audio files,
     * if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .ogg file encoded with OPUS
     * (other formats may be sent as Audio or Document).
     * On success, the sent Message is returned.
     * Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|string $voice
     * @param string $caption Voice message caption, 0-1024 characters after entities parsing
     * @param int|null $duration
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param bool $allowSendingWithoutReply Pass True, if the message should be sent even if the specified
     *                                       replied-to message is not found
     * @param string|null $parseMode
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendVoice(
        $chatId,
        $voice,
        $caption = null,
        $duration = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $allowSendingWithoutReply = false,
        $parseMode = null,
        $messageThreadId = null,
        $protectContent = null
    ) {
        return Message::fromResponse($this->call('sendVoice', [
            'chat_id' => $chatId,
            'voice' => $voice,
            'caption' => $caption,
            'duration' => $duration,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'parse_mode' => $parseMode,
            'protect_content' => (bool) $protectContent,
        ]));
    }

    /**
     * Use this method to forward messages of any kind. Service messages can't be forwarded.
     * On success, the sent Message is returned.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $fromChatId Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
     * @param string $messageId Message identifier in the chat specified in from_chat_id
     * @param bool $protectContent Protects the contents of the forwarded message from forwarding and saving
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     *
     * @return Message
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function forwardMessage(
        $chatId,
        $fromChatId,
        $messageId,
        $protectContent = false,
        $disableNotification = false,
        $messageThreadId = null
    ) {
        return Message::fromResponse($this->call('forwardMessage', [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
            'message_thread_id' => $messageThreadId,
            'protect_content' => $protectContent,
            'disable_notification' => (bool) $disableNotification,
        ]));
    }

    /**
     * Use this method to send audio files,
     * if you want Telegram clients to display them in the music player.
     * Your audio must be in the .mp3 format.
     * On success, the sent Message is returned.
     * Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     *
     * For backward compatibility, when the fields title and performer are both empty
     * and the mime-type of the file to be sent is not audio/mpeg, the file will be sent as a playable voice message.
     * For this to work, the audio must be in an .ogg file encoded with OPUS.
     * This behavior will be phased out in the future. For sending voice messages, use the sendVoice method instead.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|string $audio
     * @param int|null $duration
     * @param string|null $performer
     * @param string|null $title
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param string|null $parseMode
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     * @param \CURLFile|\CURLStringFile|string|null $thumbnail
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     * @deprecated since 20th February. Removed backward compatibility from the method sendAudio.
     * Voice messages now must be sent using the method sendVoice.
     * There is no more need to specify a non-empty title or performer while sending the audio by file_id.
     *
     */
    public function sendAudio(
        $chatId,
        $audio,
        $duration = null,
        $performer = null,
        $title = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $parseMode = null,
        $protectContent = null,
        $allowSendingWithoutReply = null,
        $thumbnail = null
    ) {
        return Message::fromResponse($this->call('sendAudio', [
            'chat_id' => $chatId,
            'audio' => $audio,
            'duration' => $duration,
            'performer' => $performer,
            'title' => $title,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'parse_mode' => $parseMode,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
            'thumbnail' => $thumbnail,
        ]));
    }

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|string $photo
     * @param string|null $caption
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param string|null $parseMode
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendPhoto(
        $chatId,
        $photo,
        $caption = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $parseMode = null,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null
    ) {
        return Message::fromResponse($this->call('sendPhoto', [
            'chat_id' => $chatId,
            'photo' => $photo,
            'caption' => $caption,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'parse_mode' => $parseMode,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
    }

    /**
     * Use this method to send general files. On success, the sent Message is returned.
     * Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|\CURLStringFile|string $document
     * @param string|null $caption
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param string|null $parseMode
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     * @param \CURLFile|\CURLStringFile|string|null $thumbnail
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendDocument(
        $chatId,
        $document,
        $caption = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $parseMode = null,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null,
        $thumbnail = null
    ) {
        return Message::fromResponse($this->call('sendDocument', [
            'chat_id' => $chatId,
            'document' => $document,
            'caption' => $caption,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'parse_mode' => $parseMode,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
            'thumbnail' => $thumbnail,
        ]));
    }

    /**
     * Use this method to get basic info about a file and prepare it for downloading.
     * For the moment, bots can download files of up to 20MB in size.
     * On success, a File object is returned.
     * The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>,
     * where <file_path> is taken from the response.
     * It is guaranteed that the link will be valid for at least 1 hour.
     * When the link expires, a new one can be requested by calling getFile again.
     *
     * @param string $fileId
     *
     * @return File
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function getFile($fileId)
    {
        return File::fromResponse($this->call('getFile', ['file_id' => $fileId]));
    }

    /**
     * Get file contents via cURL
     *
     * @param string $fileId
     *
     * @return string
     *
     * @throws HttpException
     * @throws Exception
     */
    public function downloadFile($fileId)
    {
        $file = $this->getFile($fileId);
        $options = [
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPGET => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->getFileUrl().'/'.$file->getFilePath(),
        ];

        return $this->executeCurl($options);
    }

    /**
     * Use this method to send answers to an inline query. On success, True is returned.
     * No more than 50 results per query are allowed.
     *
     * @param string $inlineQueryId
     * @param AbstractInlineQueryResult[] $results
     * @param int $cacheTime
     * @param bool $isPersonal
     * @param string $nextOffset
     * @param string $switchPmText
     * @param string $switchPmParameter
     *
     * @return mixed
     * @throws Exception
     */
    public function answerInlineQuery(
        $inlineQueryId,
        $results,
        $cacheTime = 300,
        $isPersonal = false,
        $nextOffset = '',
        $switchPmText = null,
        $switchPmParameter = null
    ) {
        $results = array_map(
            /**
             * @param AbstractInlineQueryResult $item
             * @return array
             */
            function ($item) {
                /** @var array $array */
                $array = $item->toJson(true);

                return $array;
            },
            $results
        );

        return $this->call('answerInlineQuery', [
            'inline_query_id' => $inlineQueryId,
            'results' => json_encode($results),
            'cache_time' => $cacheTime,
            'is_personal' => $isPersonal,
            'next_offset' => $nextOffset,
            'switch_pm_text' => $switchPmText,
            'switch_pm_parameter' => $switchPmParameter,
        ]);
    }

    /**
     * Use this method to kick a user from a group or a supergroup.
     * In the case of supergroups, the user will not be able to return to the group
     * on their own using invite links, etc., unless unbanned first.
     * The bot must be an administrator in the group for this to work. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target group
     *                           or username of the target supergroup (in the format @supergroupusername)
     * @param int $userId Unique identifier of the target user
     * @param null|int $untilDate Date when the user will be unbanned, unix time.
     *                            If user is banned for more than 366 days or less than 30 seconds from the current time
     *                            they are considered to be banned forever
     *
     * @return bool
     * @throws Exception
     */
    public function kickChatMember($chatId, $userId, $untilDate = null)
    {
        @trigger_error(sprintf('Method "%s::%s" is deprecated. Use "banChatMember"', __CLASS__, __METHOD__), \E_USER_DEPRECATED);

        return $this->call('kickChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'until_date' => $untilDate
        ]);
    }

    /**
     * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels,
     * the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     * Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target group or username of the
     *                           target supergroup or channel (in the format @channelusername)
     * @param int $userId Unique identifier of the target user
     * @param null|int $untilDate Date when the user will be unbanned, unix time.
     *                            If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever.
     *                            Applied for supergroups and channels only.
     * @param bool|null $revokeMessages Pass True to delete all messages from the chat for the user that is being removed.
     *                                  If False, the user will be able to see messages in the group that were sent before the user was removed.
     *                                  Always True for supergroups and channels.
     *
     * @return bool
     * @throws Exception
     */
    public function banChatMember($chatId, $userId, $untilDate = null, $revokeMessages = null)
    {
        return $this->call('banChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'until_date' => $untilDate,
            'revoke_messages' => $revokeMessages,
        ]);
    }

    /**
     * Use this method to unban a previously kicked user in a supergroup.
     * The user will not return to the group automatically, but will be able to join via link, etc.
     * The bot must be an administrator in the group for this to work. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target group
     *                           or username of the target supergroup (in the format @supergroupusername)
     * @param int $userId Unique identifier of the target user
     *
     * @return bool
     * @throws Exception
     */
    public function unbanChatMember($chatId, $userId)
    {
        return $this->call('unbanChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]);
    }

    /**
     * Use this method to send answers to callback queries sent from inline keyboards.
     * The answer will be displayed to the user as a notification at the top of the chat screen or as an alert.
     *
     * @param string $callbackQueryId
     * @param string|null $text
     * @param bool $showAlert
     * @param string|null $url
     * @param int $cacheTime
     *
     * @return bool
     * @throws Exception
     */
    public function answerCallbackQuery($callbackQueryId, $text = null, $showAlert = false, $url = null, $cacheTime = 0)
    {
        return $this->call('answerCallbackQuery', [
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
            'show_alert' => (bool) $showAlert,
            'url' => $url,
            'cache_time' => $cacheTime
        ]);
    }

    /**
     * Use this method to change the list of the bot's commands. Returns True on success.
     *
     * @param ArrayOfBotCommand|BotCommand[] $commands
     * @param string|null $scope
     * @param string|null $languageCode
     *
     * @return mixed
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function setMyCommands($commands, $scope = null, $languageCode = null)
    {
        if (!$commands instanceof ArrayOfBotCommand) {
            @trigger_error(sprintf('Passing array of BotCommand to "%s::%s" is deprecated. Use %s', __CLASS__, __METHOD__, ArrayOfBotCommand::class), \E_USER_DEPRECATED);
            $commands = new ArrayOfBotCommand($commands);
        }

        return $this->call('setMyCommands', [
            'commands' => $commands->toJson(),
            'scope' => $scope,
            'language_code' => $languageCode,
        ]);
    }

    /**
     * Use this method to get the current list of the bot's commands. Requires no parameters.
     * Returns Array of BotCommand on success.
     *
     * @return ArrayOfBotCommand
     *
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function getMyCommands()
    {
        return ArrayOfBotCommand::fromResponse($this->call('getMyCommands'));
    }

    /**
     * Use this method to edit text messages sent by the bot or via the bot
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param string $text
     * @param string $inlineMessageId
     * @param string|null $parseMode
     * @param bool $disablePreview
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return Message|true
     * @throws Exception
     */
    public function editMessageText(
        $chatId,
        $messageId,
        $text,
        $parseMode = null,
        $disablePreview = false,
        $replyMarkup = null,
        $inlineMessageId = null
    ) {
        $response = $this->call('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text,
            'inline_message_id' => $inlineMessageId,
            'parse_mode' => $parseMode,
            'disable_web_page_preview' => $disablePreview,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to edit text messages sent by the bot or via the bot
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param string|null $caption
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param string $inlineMessageId
     * @param string|null $parseMode
     *
     * @return Message|true
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function editMessageCaption(
        $chatId,
        $messageId,
        $caption = null,
        $replyMarkup = null,
        $inlineMessageId = null,
        $parseMode = null
    ) {
        $response = $this->call('editMessageCaption', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'caption' => $caption,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'parse_mode' => $parseMode
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages.
     * If a message is a part of a message album, then it can be edited only to a photo or a video.
     * Otherwise, message type can be changed arbitrarily.
     * When inline message is edited, new file can't be uploaded.
     * Use previously uploaded file via its file_id or specify a URL.
     * On success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned
     *
     * @param string $chatId
     * @param string $messageId
     * @param InputMedia $media
     * @param string|null $inlineMessageId
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param array<string, \CURLFile|\CURLStringFile> $attachments Attachments to use in attach://<attachment>
     *
     * @return Message|true
     *
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function editMessageMedia(
        $chatId,
        $messageId,
        InputMedia $media,
        $inlineMessageId = null,
        $replyMarkup = null,
        $attachments = []
    ) {
        $response = $this->call('editMessageMedia', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'media' => $media->toJson(),
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
        ] + $attachments);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to edit only the reply markup of messages sent by the bot or via the bot
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param string $inlineMessageId
     *
     * @return Message|true
     * @throws Exception
     */
    public function editMessageReplyMarkup(
        $chatId,
        $messageId,
        $replyMarkup = null,
        $inlineMessageId = null
    ) {
        $response = $this->call('editMessageReplyMarkup', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to delete a message, including service messages, with the following limitations:
     *  - A message can only be deleted if it was sent less than 48 hours ago.
     *  - Bots can delete outgoing messages in groups and supergroups.
     *  - Bots granted can_post_messages permissions can delete outgoing messages in channels.
     *  - If the bot is an administrator of a group, it can delete any message there.
     *  - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
     *
     * @param int|string $chatId
     * @param int $messageId
     *
     * @return bool
     * @throws Exception
     */
    public function deleteMessage($chatId, $messageId)
    {
        return $this->call('deleteMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ]);
    }

    /**
     * Close curl
     */
    public function __destruct()
    {
        curl_close($this->curl);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return self::URL_PREFIX.$this->token;
    }

    /**
     * @return string
     */
    public function getFileUrl()
    {
        return self::FILE_URL_PREFIX.$this->token;
    }

    /**
     * @param Update $update
     * @param string $eventName
     *
     * @throws Exception
     *
     * @return void
     */
    public function trackUpdate(Update $update, $eventName = 'Message')
    {
        if (!in_array($update->getUpdateId(), $this->trackedEvents)) {
            $message = $update->getMessage();
            if (!$message) {
                return;
            }
            $this->trackedEvents[] = $update->getUpdateId();

            $this->track($message, $eventName);

            if (count($this->trackedEvents) > self::MAX_TRACKED_EVENTS) {
                $this->trackedEvents = array_slice($this->trackedEvents, (int) round(self::MAX_TRACKED_EVENTS / 4));
            }
        }
    }

    /**
     * Wrapper for tracker
     *
     * @param Message $message
     * @param string $eventName
     *
     * @throws Exception
     *
     * @return void
     */
    public function track(Message $message, $eventName = 'Message')
    {
        if ($this->tracker instanceof Botan) {
            $this->tracker->track($message, $eventName);
        }
    }

    /**
     * Use this method to send invoices. On success, the sent Message is returned.
     *
     * @param int|string $chatId
     * @param string $title
     * @param string $description
     * @param string $payload
     * @param string $providerToken
     * @param string $startParameter
     * @param string $currency
     * @param array $prices
     * @param bool $isFlexible
     * @param string|null $photoUrl
     * @param int|null $photoSize
     * @param int|null $photoWidth
     * @param int|null $photoHeight
     * @param bool $needName
     * @param bool $needPhoneNumber
     * @param bool $needEmail
     * @param bool $needShippingAddress
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param string|null $providerData
     * @param bool $sendPhoneNumberToProvider
     * @param bool $sendEmailToProvider
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     *
     * @return Message
     * @throws Exception
     */
    public function sendInvoice(
        $chatId,
        $title,
        $description,
        $payload,
        $providerToken,
        $startParameter,
        $currency,
        $prices,
        $isFlexible = false,
        $photoUrl = null,
        $photoSize = null,
        $photoWidth = null,
        $photoHeight = null,
        $needName = false,
        $needPhoneNumber = false,
        $needEmail = false,
        $needShippingAddress = false,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $providerData = null,
        $sendPhoneNumberToProvider = false,
        $sendEmailToProvider = false,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null
    ) {
        return Message::fromResponse($this->call('sendInvoice', [
            'chat_id' => $chatId,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $providerToken,
            'start_parameter' => $startParameter,
            'currency' => $currency,
            'prices' => json_encode($prices),
            'is_flexible' => $isFlexible,
            'photo_url' => $photoUrl,
            'photo_size' => $photoSize,
            'photo_width' => $photoWidth,
            'photo_height' => $photoHeight,
            'need_name' => $needName,
            'need_phone_number' => $needPhoneNumber,
            'need_email' => $needEmail,
            'need_shipping_address' => $needShippingAddress,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'provider_data' => $providerData,
            'send_phone_number_to_provider' => (bool) $sendPhoneNumberToProvider,
            'send_email_to_provider' => (bool) $sendEmailToProvider,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
    }

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API
     * will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries.
     * On success, True is returned.
     *
     * @param string $shippingQueryId
     * @param bool $ok
     * @param array $shippingOptions
     * @param null|string $errorMessage
     *
     * @return bool
     * @throws Exception
     */
    public function answerShippingQuery($shippingQueryId, $ok = true, $shippingOptions = [], $errorMessage = null)
    {
        return $this->call('answerShippingQuery', [
            'shipping_query_id' => $shippingQueryId,
            'ok' => (bool) $ok,
            'shipping_options' => json_encode($shippingOptions),
            'error_message' => $errorMessage
        ]);
    }

    /**
     * Use this method to respond to such pre-checkout queries. On success, True is returned.
     * Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     *
     * @param string $preCheckoutQueryId
     * @param bool $ok
     * @param null|string $errorMessage
     *
     * @return bool
     * @throws Exception
     */
    public function answerPreCheckoutQuery($preCheckoutQueryId, $ok = true, $errorMessage = null)
    {
        return $this->call('answerPreCheckoutQuery', [
            'pre_checkout_query_id' => $preCheckoutQueryId,
            'ok' => (bool) $ok,
            'error_message' => $errorMessage
        ]);
    }

    /**
     * Use this method to restrict a user in a supergroup.
     * The bot must be an administrator in the supergroup for this to work and must have the appropriate admin rights.
     * Pass True for all boolean parameters to lift restrictions from a user.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target supergroup
     *                           (in the format @supergroupusername)
     * @param int $userId Unique identifier of the target user
     * @param null|integer $untilDate Date when restrictions will be lifted for the user, unix time.
     *                                If user is restricted for more than 366 days or less than 30 seconds from the current time,
     *                                they are considered to be restricted forever
     * @param bool $canSendMessages Pass True, if the user can send text messages, contacts, locations and venues
     * @param bool $canSendMediaMessages No Pass True, if the user can send audios, documents, photos, videos,
     *                                   video notes and voice notes, implies can_send_messages
     * @param bool $canSendOtherMessages Pass True, if the user can send animations, games, stickers and
     *                                   use inline bots, implies can_send_media_messages
     * @param bool $canAddWebPagePreviews Pass True, if the user may add web page previews to their messages,
     *                                    implies can_send_media_messages
     *
     * @return bool
     * @throws Exception
     */
    public function restrictChatMember(
        $chatId,
        $userId,
        $untilDate = null,
        $canSendMessages = false,
        $canSendMediaMessages = false,
        $canSendOtherMessages = false,
        $canAddWebPagePreviews = false
    ) {
        return $this->call('restrictChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'until_date' => $untilDate,
            'can_send_messages' => $canSendMessages,
            'can_send_media_messages' => $canSendMediaMessages,
            'can_send_other_messages' => $canSendOtherMessages,
            'can_add_web_page_previews' => $canAddWebPagePreviews
        ]);
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     * Pass False for all boolean parameters to demote a user.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target supergroup
     *                           (in the format @supergroupusername)
     * @param int $userId Unique identifier of the target user
     * @param bool $canChangeInfo Pass True, if the administrator can change chat title, photo and other settings
     * @param bool $canPostMessages Pass True, if the administrator can create channel posts, channels only
     * @param bool $canEditMessages Pass True, if the administrator can edit messages of other users, channels only
     * @param bool $canDeleteMessages Pass True, if the administrator can delete messages of other users
     * @param bool $canInviteUsers Pass True, if the administrator can invite new users to the chat
     * @param bool $canRestrictMembers Pass True, if the administrator can restrict, ban or unban chat members
     * @param bool $canPinMessages Pass True, if the administrator can pin messages, supergroups only
     * @param bool $canPromoteMembers Pass True, if the administrator can add new administrators with a subset of his
     *                                own privileges or demote administrators that he has promoted,directly or
     *                                indirectly (promoted by administrators that were appointed by him)
     * @param bool $canManageTopics Pass True if the user is allowed to create, rename, close, and reopen forum topics, supergroups only
     * @param bool $isAnonymous Pass True if the administrator's presence in the chat is hidden
     * @return bool
     *
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function promoteChatMember(
        $chatId,
        $userId,
        $canChangeInfo = true,
        $canPostMessages = true,
        $canEditMessages = true,
        $canDeleteMessages = true,
        $canInviteUsers = true,
        $canRestrictMembers = true,
        $canPinMessages = true,
        $canPromoteMembers = true,
        $canManageTopics = true,
        $isAnonymous = false
    ) {
        return $this->call('promoteChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'is_anonymous' => $isAnonymous,
            'can_change_info' => $canChangeInfo,
            'can_post_messages' => $canPostMessages,
            'can_edit_messages' => $canEditMessages,
            'can_delete_messages' => $canDeleteMessages,
            'can_invite_users' => $canInviteUsers,
            'can_restrict_members' => $canRestrictMembers,
            'can_pin_messages' => $canPinMessages,
            'can_promote_members' => $canPromoteMembers,
            'can_manage_topics' => $canManageTopics
        ]);
    }

    /**
     * Use this method to export an invite link to a supergroup or a channel.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @return string
     * @throws Exception
     */
    public function exportChatInviteLink($chatId)
    {
        return $this->call('exportChatInviteLink', [
            'chat_id' => $chatId
        ]);
    }

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param \CURLFile|string $photo New chat photo, uploaded using multipart/form-data
     *
     * @return bool
     * @throws Exception
     */
    public function setChatPhoto($chatId, $photo)
    {
        return $this->call('setChatPhoto', [
            'chat_id' => $chatId,
            'photo' => $photo
        ]);
    }

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     *
     * @return bool
     * @throws Exception
     */
    public function deleteChatPhoto($chatId)
    {
        return $this->call('deleteChatPhoto', [
            'chat_id' => $chatId
        ]);
    }

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param string $title New chat title, 1-255 characters
     *
     * @return bool
     * @throws Exception
     */
    public function setChatTitle($chatId, $title)
    {
        return $this->call('setChatTitle', [
            'chat_id' => $chatId,
            'title' => $title
        ]);
    }

    /**
     * Use this method to change the description of a supergroup or a channel.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param string|null $description New chat description, 0-255 characters
     *
     * @return bool
     * @throws Exception
     */
    public function setChatDescription($chatId, $description = null)
    {
        return $this->call('setChatDescription', [
            'chat_id' => $chatId,
            'title' => $description
        ]);
    }

    /**
     * Use this method to pin a message in a supergroup.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param int $messageId Identifier of a message to pin
     * @param bool $disableNotification
     *
     * @return bool
     * @throws Exception
     */
    public function pinChatMessage($chatId, $messageId, $disableNotification = false)
    {
        return $this->call('pinChatMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'disable_notification' => $disableNotification
        ]);
    }

    /**
     * Use this method to unpin a message in a supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param int|null $messageId Identifier of a message to pin (optional)
     *
     * @return bool
     * @throws Exception
     */
    public function unpinChatMessage($chatId, $messageId = null)
    {
        return $this->call('unpinChatMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ]);
    }

    /**
     * Use this method to get up to date information about the chat
     * (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.).
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     *
     * @return Chat
     * @throws Exception
     */
    public function getChat($chatId)
    {
        return Chat::fromResponse($this->call('getChat', [
            'chat_id' => $chatId
        ]));
    }

    /**
     * Use this method to get information about a member of a chat.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param int $userId
     *
     * @return ChatMember
     * @throws Exception
     */
    public function getChatMember($chatId, $userId)
    {
        return ChatMember::fromResponse($this->call('getChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId
        ]));
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     *
     * @return bool
     * @throws Exception
     */
    public function leaveChat($chatId)
    {
        return $this->call('leaveChat', [
            'chat_id' => $chatId
        ]);
    }

    /**
     * Use this method to get the number of members in a chat.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     *
     * @return int
     * @throws Exception
     */
    public function getChatMembersCount($chatId)
    {
        @trigger_error(sprintf('Method "%s::%s" is deprecated. Use "getChatMemberCount"', __CLASS__, __METHOD__), \E_USER_DEPRECATED);

        return $this->call('getChatMembersCount', [
            'chat_id' => $chatId
        ]);
    }

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target supergroup or channel
     *                           (in the format @channelusername)
     *
     * @return int
     * @throws Exception
     */
    public function getChatMemberCount($chatId)
    {
        return $this->call('getChatMemberCount', [
            'chat_id' => $chatId
        ]);
    }

    /**
     * Use this method to get a list of administrators in a chat.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     *
     * @return ChatMember[]
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function getChatAdministrators($chatId)
    {
        return ArrayOfChatMemberEntity::fromResponse(
            $this->call(
                'getChatAdministrators',
                [
                    'chat_id' => $chatId
                ]
            )
        );
    }

    /**
     * As of v.4.0, Telegram clients support rounded square mp4 videos of up to 1 minute long.
     * Use this method to send video messages.
     * On success, the sent Message is returned.
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param \CURLFile|string $videoNote
     * @param int|null $duration
     * @param int|null $length
     * @param int|null $replyToMessageId
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup
     * @param bool $disableNotification
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     * @param \CURLFile|\CURLStringFile|string|null $thumbnail
     *
     * @return Message
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function sendVideoNote(
        $chatId,
        $videoNote,
        $duration = null,
        $length = null,
        $replyToMessageId = null,
        $replyMarkup = null,
        $disableNotification = false,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null,
        $thumbnail = null
    ) {
        return Message::fromResponse($this->call('sendVideoNote', [
            'chat_id' => $chatId,
            'video_note' => $videoNote,
            'duration' => $duration,
            'length' => $length,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => $replyToMessageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
            'disable_notification' => (bool) $disableNotification,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
            'thumbnail' => $thumbnail,
        ]));
    }

    /**
     * Use this method to send a group of photos or videos as an album.
     * On success, the sent \TelegramBot\Api\Types\Message is returned.
     *
     * @param int|string $chatId
     * @param ArrayOfInputMedia $media
     * @param bool $disableNotification
     * @param int|null $replyToMessageId
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     * @param array<string, \CURLFile|\CURLStringFile> $attachments Attachments to use in attach://<attachment>
     *
     * @return Message[]
     * @throws Exception
     */
    public function sendMediaGroup(
        $chatId,
        $media,
        $disableNotification = false,
        $replyToMessageId = null,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null,
        $attachments = []
    ) {
        return ArrayOfMessages::fromResponse($this->call('sendMediaGroup', [
            'chat_id' => $chatId,
            'media' => $media->toJson(),
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => (int) $replyToMessageId,
            'disable_notification' => (bool) $disableNotification,
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ] + $attachments));
    }

    /**
     * Enable proxy for curl requests. Empty string will disable proxy.
     *
     * @param string $proxyString
     * @param bool $socks5
     *
     * @return BotApi
     */
    public function setProxy($proxyString = '', $socks5 = false)
    {
        if (empty($proxyString)) {
            $this->proxySettings = [];
            return $this;
        }

        $this->proxySettings = [
            CURLOPT_PROXY => $proxyString,
            CURLOPT_HTTPPROXYTUNNEL => true,
        ];

        if ($socks5) {
            $this->proxySettings[CURLOPT_PROXYTYPE] = CURLPROXY_SOCKS5;
        }
        return $this;
    }

    /**
     * Use this method to send a native poll. A native poll can't be sent to a private chat.
     * On success, the sent \TelegramBot\Api\Types\Message is returned.
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param string $question Poll question, 1-255 characters
     * @param array $options A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
     * @param bool $isAnonymous True, if the poll needs to be anonymous, defaults to True
     * @param string|null $type Poll type, “quiz” or “regular”, defaults to “regular”
     * @param bool $allowsMultipleAnswers True, if the poll allows multiple answers,
     *                                    ignored for polls in quiz mode, defaults to False
     * @param string|null $correctOptionId 0-based identifier of the correct answer option, required for polls in quiz mode
     * @param bool $isClosed Pass True, if the poll needs to be immediately closed. This can be useful for poll preview.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int|null $replyToMessageId If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard,
     *                                                                                                  custom reply keyboard, instructions to remove reply
     *                                                                                                  keyboard or to force a reply from the user.
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool|null $protectContent
     * @param bool|null $allowSendingWithoutReply
     *
     * @return Message
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function sendPoll(
        $chatId,
        $question,
        $options,
        $isAnonymous = false,
        $type = null,
        $allowsMultipleAnswers = false,
        $correctOptionId = null,
        $isClosed = false,
        $disableNotification = false,
        $replyToMessageId = null,
        $replyMarkup = null,
        $messageThreadId = null,
        $protectContent = null,
        $allowSendingWithoutReply = null
    ) {
        return Message::fromResponse($this->call('sendPoll', [
            'chat_id' => $chatId,
            'question' => $question,
            'options' => json_encode($options),
            'is_anonymous' => (bool) $isAnonymous,
            'type' => (string) $type,
            'allows_multiple_answers' => (bool) $allowsMultipleAnswers,
            'correct_option_id' => (int) $correctOptionId,
            'is_closed' => (bool) $isClosed,
            'disable_notification' => (bool) $disableNotification,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => (int) $replyToMessageId,
            'reply_markup' => $replyMarkup === null ? $replyMarkup : $replyMarkup->toJson(),
            'protect_content' => (bool) $protectContent,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
        ]));
    }

    /**
     * Use this method to send a dice, which will have a random value from 1 to 6.
     * On success, the sent Message is returned. (Yes, we're aware of the “proper” singular of die.
     * But it's awkward, and we decided to help it change. One dice at a time!)
     *
     * @param string|int $chatId Unique identifier for the target chat or username of the target channel
     *                           (in the format @channelusername)
     * @param string $emoji Emoji on which the dice throw animation is based. Currently, must be one of “🎲”,
     *                      “🎯”, “🏀”, “⚽”, or “🎰”. Dice can have values 1-6 for “🎲” and “🎯”, values 1-5 for “🏀” and “⚽”, and
     *                      values 1-64 for “🎰”. Defaults to “🎲
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param string|null $replyToMessageId If the message is a reply, ID of the original message
     * @param bool $allowSendingWithoutReply Pass True, if the message should be sent even if the specified replied-to
     *                                       message is not found,
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard,
     *                                                                                                  custom reply keyboard, instructions to remove reply
     *                                                                                                  keyboard or to force a reply from the user.
     * @param int|null $messageThreadId
     * @param bool|null $protectContent
     *
     * @return Message
     * @throws Exception
     * @throws HttpException
     * @throws InvalidJsonException
     */
    public function sendDice(
        $chatId,
        $emoji,
        $disableNotification = false,
        $replyToMessageId = null,
        $allowSendingWithoutReply = false,
        $replyMarkup = null,
        $messageThreadId = null,
        $protectContent = null
    ) {
        return Message::fromResponse($this->call('sendDice', [
            'chat_id' => $chatId,
            'emoji' => $emoji,
            'disable_notification' => (bool) $disableNotification,
            'message_thread_id' => $messageThreadId,
            'reply_to_message_id' => (int) $replyToMessageId,
            'allow_sending_without_reply' => (bool) $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup === null ? $replyMarkup : $replyMarkup->toJson(),
            'protect_content' => (bool) $protectContent,
        ]));
    }

    /**
     * Use this method to stop a poll which was sent by the bot.
     * On success, the stopped \TelegramBot\Api\Types\Poll with the final results is returned.
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @return Poll
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function stopPoll(
        $chatId,
        $messageId,
        $replyMarkup = null
    ) {
        return Poll::fromResponse($this->call('stopPoll', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
        ]));
    }

    /**
     * Use this method to create a topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work
     * and must have the can_manage_topics administrator rights.
     * Returns information about the created topic as a ForumTopic object.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string $name Topic name, 1-128 characters
     * @param int $iconColor Color of the topic icon in RGB format.
     *                       Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB),
     *                       9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     * @param int|null $iconCustomEmojiId Unique identifier of the custom emoji shown as the topic icon.
     *                                    Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
     *
     * @return ForumTopic
     *
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function createForumTopic(
        $chatId,
        $name,
        $iconColor,
        $iconCustomEmojiId = null
    ) {
        return ForumTopic::fromResponse($this->call('createForumTopic', [
            'chat_id' => $chatId,
            'name' => $name,
            'icon_color' => $iconColor,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ]));
    }

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights,
     * unless it is the creator of the topic. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     * @param string $name Topic name, 1-128 characters
     * @param int|null $iconCustomEmojiId Unique identifier of the custom emoji shown as the topic icon.
     *                                    Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
     *
     * @return bool
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function editForumTopic(
        $chatId,
        $messageThreadId,
        $name,
        $iconCustomEmojiId = null
    ) {
        return $this->call('editForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'name' => $name,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ]);
    }

    /**
     * Use this method to delete a topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights,
     * unless it is the creator of the topic. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return bool
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function closeForumTopic($chatId, $messageThreadId)
    {
        return $this->call('closeForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights,
     * unless it is the creator of the topic. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return bool
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function reopenForumTopic($chatId, $messageThreadId)
    {
        return $this->call('reopenForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights.
     * Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return bool
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function deleteForumTopic($chatId, $messageThreadId)
    {
        return $this->call('deleteForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to clear the list of pinned messages in a forum topic.
     * The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup.
     * Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return bool
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function unpinAllForumTopicMessages($chatId, $messageThreadId)
    {
        return $this->call('unpinAllForumTopicMessages', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user.
     * Requires no parameters. Returns an Array of Sticker objects.
     *
     * @return Sticker[]
     * @throws Exception
     *
     * @author bernard-ng <bernard@devscast.tech>
     */
    public function getForumTopicIconStickers()
    {
        return ArrayOfSticker::fromResponse($this->call('getForumTopicIconStickers'));
    }

    /**
     * @param string $webAppQueryId
     * @param AbstractInlineQueryResult $result
     * @return SentWebAppMessage
     * @throws Exception
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     */
    public function answerWebAppQuery($webAppQueryId, $result)
    {
        return SentWebAppMessage::fromResponse($this->call('answerWebAppQuery', [
            'web_app_query_id' => $webAppQueryId,
            'result' => $result->toJson(),
        ]));
    }

    /**
     * Set an option for a cURL transfer
     *
     * @param int $option The CURLOPT_XXX option to set
     * @param mixed $value The value to be set on option
     *
     * @return void
     */
    public function setCurlOption($option, $value)
    {
        $this->customCurlOptions[$option] = $value;
    }

    /**
     * Unset an option for a cURL transfer
     *
     * @param int $option The CURLOPT_XXX option to unset
     *
     * @return void
     */
    public function unsetCurlOption($option)
    {
        unset($this->customCurlOptions[$option]);
    }

    /**
     * Clean custom options
     *
     * @return void
     */
    public function resetCurlOptions()
    {
        $this->customCurlOptions = [];
    }
}
