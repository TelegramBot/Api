<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class User
 * This object represents a Telegram user or bot.
 *
 * @package TelegramBot\Api\Types
 */
class User extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['id', 'first_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'id' => true,
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'language_code' => true,
        'is_bot' => true,
        'is_premium' => true,
        'added_to_attachment_menu' => true,
        'can_join_groups' => true,
        'can_read_all_group_messages' => true,
        'supports_inline_queries' => true
    ];

    /**
     * Unique identifier for this user or bot
     *
     * @var int|float
     */
    protected $id;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    protected $firstName;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string|null
     */
    protected $username;

    /**
     * Optional. IETF language tag of the user's language
     *
     * @var string|null
     */
    protected $languageCode;

    /**
     * True, if this user is a bot
     *
     * @var bool
     */
    protected $isBot;

    /**
     * Optional. True, if this user is a Telegram Premium user
     *
     * @var bool|null
     */
    protected $isPremium;

    /**
     * Optional. True, if this user added the bot to the attachment menu
     *
     * @var bool|null
     */
    protected $addedToAttachmentMenu;

    /**
     * Optional. True, if the bot can be invited to groups. Returned only in getMe.
     *
     * @var bool|null
     */
    protected $canJoinGroups;

    /**
     * Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     *
     * @var bool|null
     */
    protected $canReadAllGroupMessages;

    /**
     * Optional. True, if the bot supports inline queries. Returned only in getMe.
     *
     * @var bool|null
     */
    protected $supportsInlineQueries;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (!is_int($id) && !is_float($id)) {
            throw new InvalidArgumentException('ID must be an integer or float');
        }
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function isBot()
    {
        return $this->isBot;
    }

    public function setIsBot($isBot)
    {
        $this->isBot = $isBot;
    }

    public function getIsPremium()
    {
        return $this->isPremium;
    }

    public function setIsPremium($isPremium)
    {
        $this->isPremium = $isPremium;
    }

    public function getAddedToAttachmentMenu()
    {
        return $this->addedToAttachmentMenu;
    }

    public function setAddedToAttachmentMenu($addedToAttachmentMenu)
    {
        $this->addedToAttachmentMenu = $addedToAttachmentMenu;
    }

    public function getCanJoinGroups()
    {
        return $this->canJoinGroups;
    }

    public function setCanJoinGroups($canJoinGroups)
    {
        $this->canJoinGroups = $canJoinGroups;
    }

    public function getCanReadAllGroupMessages()
    {
        return $this->canReadAllGroupMessages;
    }

    public function setCanReadAllGroupMessages($canReadAllGroupMessages)
    {
        $this->canReadAllGroupMessages = $canReadAllGroupMessages;
    }

    public function getSupportsInlineQueries()
    {
        return $this->supportsInlineQueries;
    }

    public function setSupportsInlineQueries($supportsInlineQueries)
    {
        $this->supportsInlineQueries = $supportsInlineQueries;
    }
}
