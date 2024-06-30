<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class KeyboardButtonRequestChat
 * This object defines the criteria used to request a suitable chat.
 * Information about the selected chat will be shared with the bot when the corresponding button is pressed.
 * The bot will be granted requested rights in the chat if appropriate.
 *
 * @package TelegramBot\Api\Types
 */
class KeyboardButtonRequestChat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['request_id', 'chat_is_channel'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'request_id' => true,
        'chat_is_channel' => true,
        'chat_is_forum' => true,
        'chat_has_username' => true,
        'chat_is_created' => true,
        'user_administrator_rights' => ChatAdministratorRights::class,
        'bot_administrator_rights' => ChatAdministratorRights::class,
        'bot_is_member' => true,
        'request_title' => true,
        'request_username' => true,
        'request_photo' => true,
    ];

    /**
     * Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique within the message
     *
     * @var int
     */
    protected $requestId;

    /**
     * Pass True to request a channel chat, pass False to request a group or a supergroup chat.
     *
     * @var bool
     */
    protected $chatIsChannel;

    /**
     * Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected $chatIsForum;

    /**
     * Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected $chatHasUsername;

    /**
     * Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected $chatIsCreated;

    /**
     * Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
     *
     * @var ChatAdministratorRights|null
     */
    protected $userAdministratorRights;

    /**
     * Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
     *
     * @var ChatAdministratorRights|null
     */
    protected $botAdministratorRights;

    /**
     * Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected $botIsMember;

    /**
     * Optional. Pass True to request the chat's title.
     *
     * @var bool|null
     */
    protected $requestTitle;

    /**
     * Optional. Pass True to request the chat's username.
     *
     * @var bool|null
     */
    protected $requestUsername;

    /**
     * Optional. Pass True to request the chat's photo.
     *
     * @var bool|null
     */
    protected $requestPhoto;

    /**
     * @return int
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param int $requestId
     * @return void
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @return bool
     */
    public function getChatIsChannel()
    {
        return $this->chatIsChannel;
    }

    /**
     * @param bool $chatIsChannel
     * @return void
     */
    public function setChatIsChannel($chatIsChannel)
    {
        $this->chatIsChannel = $chatIsChannel;
    }

    /**
     * @return bool|null
     */
    public function getChatIsForum()
    {
        return $this->chatIsForum;
    }

    /**
     * @param bool|null $chatIsForum
     * @return void
     */
    public function setChatIsForum($chatIsForum)
    {
        $this->chatIsForum = $chatIsForum;
    }

    /**
     * @return bool|null
     */
    public function getChatHasUsername()
    {
        return $this->chatHasUsername;
    }

    /**
     * @param bool|null $chatHasUsername
     * @return void
     */
    public function setChatHasUsername($chatHasUsername)
    {
        $this->chatHasUsername = $chatHasUsername;
    }

    /**
     * @return bool|null
     */
    public function getChatIsCreated()
    {
        return $this->chatIsCreated;
    }

    /**
     * @param bool|null $chatIsCreated
     * @return void
     */
    public function setChatIsCreated($chatIsCreated)
    {
        $this->chatIsCreated = $chatIsCreated;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getUserAdministratorRights()
    {
        return $this->userAdministratorRights;
    }

    /**
     * @param ChatAdministratorRights|null $userAdministratorRights
     * @return void
     */
    public function setUserAdministratorRights($userAdministratorRights)
    {
        $this->userAdministratorRights = $userAdministratorRights;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getBotAdministratorRights()
    {
        return $this->botAdministratorRights;
    }

    /**
     * @param ChatAdministratorRights|null $botAdministratorRights
     * @return void
     */
    public function setBotAdministratorRights($botAdministratorRights)
    {
        $this->botAdministratorRights = $botAdministratorRights;
    }

    /**
     * @return bool|null
     */
    public function getBotIsMember()
    {
        return $this->botIsMember;
    }

    /**
     * @param bool|null $botIsMember
     * @return void
     */
    public function setBotIsMember($botIsMember)
    {
        $this->botIsMember = $botIsMember;
    }

    /**
     * @return bool|null
     */
    public function getRequestTitle()
    {
        return $this->requestTitle;
    }

    /**
     * @param bool|null $requestTitle
     * @return void
     */
    public function setRequestTitle($requestTitle)
    {
        $this->requestTitle = $requestTitle;
    }

    /**
     * @return bool|null
     */
    public function getRequestUsername()
    {
        return $this->requestUsername;
    }

    /**
     * @param bool|null $requestUsername
     * @return void
     */
    public function setRequestUsername($requestUsername)
    {
        $this->requestUsername = $requestUsername;
    }

    /**
     * @return bool|null
     */
    public function getRequestPhoto()
    {
        return $this->requestPhoto;
    }

    /**
     * @param bool|null $requestPhoto
     * @return void
     */
    public function setRequestPhoto($requestPhoto)
    {
        $this->requestPhoto = $requestPhoto;
    }
}
