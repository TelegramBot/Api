<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Chat extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['id', 'type'];

    /**
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'type' => true,
        'title' => true,
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'photo' => ChatPhoto::class,
        'bio' => true,
        'description' => true,
        'invite_link' => true,
        'pinned_message' => Message::class,
        'permissions' => ChatPermissions::class,
        'slow_mode_delay' => true,
        'sticker_set_name' => true,
        'can_set_sticker_set' => true,
        'linked_chat_id' => true,
        'location' => ChatLocation::class
    ];

    /**
     * Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier.
     *
     * @var int
     */
    protected int $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @var string
     */
    protected string $type;

    /**
     * Optional. Title, for channels and group chats
     *
     * @var string
     */
    protected string $title;

    /**
     * Optional. Username, for private chats and channels if available
     *
     * @var string
     */
    protected string $username;

    /**
     * Optional. First name of the other party in a private chat
     *
     * @var string
     */
    protected string $firstName;

    /**
     * Optional. Last name of the other party in a private chat
     *
     * @var string
     */
    protected string $lastName;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto
     */
    protected ChatPhoto $photo;

    /**
     * Optional. Bio of the other party in a private chat. Returned only in getChat
     *
     * @var string
     */
    protected string $bio;

    /**
     * Optional. Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected string $description;

    /**
     * Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected string $inviteLink;

    /**
     * Optional. Pinned message, for supergroups. Returned only in getChat.
     *
     * @var Message
     */
    protected Message $pinnedMessage;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     *
     * @var ChatPermissions
     */
    protected ChatPermissions $permissions;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged
     * user. Returned only in getChat.
     *
     * @var int
     */
    protected int $slowModeDelay;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string
     */
    protected string $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool
     */
    protected bool $canSetStickerSet;

    /**
     * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice
     * versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64
     * bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
     *
     * @var int
     */
    protected int $linkedChatId;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
     *
     * @var ChatLocation
     */
    protected ChatLocation $location;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     * @return ChatPhoto
     */
    public function getPhoto(): ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto $photo
     */
    public function setPhoto(ChatPhoto $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getBio(): string
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getInviteLink(): string
    {
        return $this->inviteLink;
    }

    /**
     * @param string $inviteLink
     */
    public function setInviteLink(string $inviteLink): void
    {
        $this->inviteLink = $inviteLink;
    }

    /**
     * @return Message
     */
    public function getPinnedMessage(): Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message $pinnedMessage
     */
    public function setPinnedMessage(Message $pinnedMessage): void
    {
        $this->pinnedMessage = $pinnedMessage;
    }

    /**
     * @return ChatPermissions
     */
    public function getPermissions(): ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * @param ChatPermissions $permissions
     */
    public function setPermissions(ChatPermissions $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * @return int
     */
    public function getSlowModeDelay(): int
    {
        return $this->slowModeDelay;
    }

    /**
     * @param int $slowModeDelay
     */
    public function setSlowModeDelay(int $slowModeDelay): void
    {
        $this->slowModeDelay = $slowModeDelay;
    }

    /**
     * @return string
     */
    public function getStickerSetName(): string
    {
        return $this->stickerSetName;
    }

    /**
     * @param string $stickerSetName
     */
    public function setStickerSetName(string $stickerSetName): void
    {
        $this->stickerSetName = $stickerSetName;
    }

    /**
     * @return bool
     */
    public function isCanSetStickerSet(): bool
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param bool $canSetStickerSet
     */
    public function setCanSetStickerSet(bool $canSetStickerSet): void
    {
        $this->canSetStickerSet = $canSetStickerSet;
    }

    /**
     * @return int
     */
    public function getLinkedChatId(): int
    {
        return $this->linkedChatId;
    }

    /**
     * @param int $linkedChatId
     */
    public function setLinkedChatId(int $linkedChatId): void
    {
        $this->linkedChatId = $linkedChatId;
    }

    /**
     * @return ChatLocation
     */
    public function getLocation(): ChatLocation
    {
        return $this->location;
    }

    /**
     * @param ChatLocation $location
     */
    public function setLocation(ChatLocation $location): void
    {
        $this->location = $location;
    }
}
