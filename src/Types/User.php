<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class User extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['id', 'is_bot', 'first_name'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'id' => true,
        'is_bot' => true,
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'language_code' => true,
        'can_join_groups' => true,
        'can_read_all_group_messages' => true,
        'supports_inline_queries' => true,
    ];

    /**
     * Unique identifier for this user or bot
     *
     * @var int
     */
    protected int $id;

    /**
     * True, if this user is a bot
     *
     * @var bool
     */
    protected bool $isBot;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    protected string $firstName;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string
     */
    protected string $lastName;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string
     */
    protected string $username;

    /**
     * Optional. IETF language tag of the user's language
     *
     * @var string
     */
    protected string $languageCode;

    /**
     * Optional. True, if the bot can be invited to groups. Returned only in getMe.
     *
     * @var bool
     */
    protected bool $canJoinGroups;

    /**
     * Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     *
     * @var bool
     */
    protected bool $canReadAllGroupMessages;

    /**
     * Optional. True, if the bot supports inline queries. Returned only in getMe.
     *
     * @var bool
     */
    protected bool $supportsInlineQueries;

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->isBot;
    }

    /**
     * @param bool $isBot
     */
    public function setIsBot(bool $isBot): void
    {
        $this->isBot = $isBot;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     */
    public function setLanguageCode(string $languageCode): void
    {
        $this->languageCode = $languageCode;
    }

    /**
     * @return bool
     */
    public function isCanJoinGroups(): bool
    {
        return $this->canJoinGroups;
    }

    /**
     * @param bool $canJoinGroups
     */
    public function setCanJoinGroups(bool $canJoinGroups): void
    {
        $this->canJoinGroups = $canJoinGroups;
    }

    /**
     * @return bool
     */
    public function isCanReadAllGroupMessages(): bool
    {
        return $this->canReadAllGroupMessages;
    }

    /**
     * @param bool $canReadAllGroupMessages
     */
    public function setCanReadAllGroupMessages(bool $canReadAllGroupMessages): void
    {
        $this->canReadAllGroupMessages = $canReadAllGroupMessages;
    }

    /**
     * @return bool
     */
    public function isSupportsInlineQueries(): bool
    {
        return $this->supportsInlineQueries;
    }

    /**
     * @param bool $supportsInlineQueries
     */
    public function setSupportsInlineQueries(bool $supportsInlineQueries): void
    {
        $this->supportsInlineQueries = $supportsInlineQueries;
    }
}
