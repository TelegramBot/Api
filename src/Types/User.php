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
        'is_premium' => true,
        'added_to_attachment_menu' => true,
        'can_join_groups' => true,
        'can_read_all_group_messages' => true,
        'supports_inline_queries' => true,
        'is_bot' => true
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

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return int|float
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public function setId($id)
    {
        if (is_integer($id) || is_float($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return null|string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return null|string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return null|string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     *
     * @return void
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return $this->isBot;
    }

    /**
     * @param bool $isBot
     *
     * @return void
     */
    public function setIsBot($isBot)
    {
        $this->isBot = $isBot;
    }

    /**
     * @param bool $isPremium
     *
     * @return void
     */
    public function setIsPremium($isPremium)
    {
        $this->isPremium = $isPremium;
    }

    /**
     * @return bool|null
     */
    public function getIsPremium()
    {
        return $this->isPremium;
    }

    /**
     * @param bool $addedToAttachmentMenu
     *
     * @return void
     */
    public function setAddedToAttachmentMenu($addedToAttachmentMenu)
    {
        $this->addedToAttachmentMenu = $addedToAttachmentMenu;
    }

    /**
     * @return bool|null
     */
    public function getAddedToAttachmentMenu()
    {
        return $this->addedToAttachmentMenu;
    }

    /**
     * @param bool $canJoinGroups
     *
     * @return void
     */
    public function setCanJoinGroups($canJoinGroups)
    {
        $this->canJoinGroups = $canJoinGroups;
    }

    /**
     * @return bool|null
     */
    public function getCanJoinGroups()
    {
        return $this->canJoinGroups;
    }

    /**
     * @param bool $canReadAllGroupMessages
     *
     * @return void
     */
    public function setCanReadAllGroupMessages($canReadAllGroupMessages)
    {
        $this->canReadAllGroupMessages = $canReadAllGroupMessages;
    }

    /**
     * @return bool|null
     */
    public function getCanReadAllGroupMessages()
    {
        return $this->canReadAllGroupMessages;
    }

    /**
     * @param bool $supportsInlineQueries
     *
     * @return void
     */
    public function setSupportsInlineQueries($supportsInlineQueries)
    {
        $this->supportsInlineQueries = $supportsInlineQueries;
    }

    /**
     * @return bool|null
     */
    public function getSupportsInlineQueries()
    {
        return $this->supportsInlineQueries;
    }

}
