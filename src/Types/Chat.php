<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

class Chat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['id', 'type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'id' => true,
        'type' => true,
        'title' => true,
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'photo' => ChatPhoto::class,
        'description' => true,
        'invite_link' => true,
        'pinned_message' => Message::class,
        'sticker_set_name' => true,
        'can_set_sticker_set' => true
    ];

    /**
     * Unique identifier for this chat, not exceeding 1e13 by absolute value
     *
     * @var int
     */
    protected $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @var string
     */
    protected $type;

    /**
     * Optional. Title, for channels and group chats
     *
     * @var string|null
     */
    protected $title;

    /**
     * Optional. Username, for private chats and channels if available
     *
     * @var string|null
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat
     *
     * @var string|null
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto|null
     */
    protected $photo;

    /**
     * Optional. Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    protected $description;

    /**
     * Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    protected $inviteLink;

    /**
     * Optional. Pinned message, for supergroups. Returned only in getChat.
     *
     * @var Message|null
     */
    protected $pinnedMessage;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     *
     * @var ChatPermissions|null
     */
    protected $permissions;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string|null
     */
    protected $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $canSetStickerSet;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Chat
     */
    public function setId(int $id): Chat
    {
        $this->id = $id;

        return $this;
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
     * @return Chat
     */
    public function setType(string $type): Chat
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Chat
     */
    public function setTitle(string $title): Chat
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Chat
     */
    public function setUsername(string $username): Chat
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return Chat
     */
    public function setFirstName($firstName): Chat
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Chat
     */
    public function setLastName(string $lastName): Chat
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return ChatPhoto|null
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto $photo
     * @return Chat
     */
    public function setPhoto(ChatPhoto $photo): Chat
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Chat
     */
    public function setDescription(string $description): Chat
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }

    /**
     * @param string $inviteLink
     * @return Chat
     */
    public function setInviteLink(string $inviteLink): Chat
    {
        $this->inviteLink = $inviteLink;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message $pinnedMessage
     * @return Chat
     */
    public function setPinnedMessage(Message $pinnedMessage): Chat
    {
        $this->pinnedMessage = $pinnedMessage;

        return $this;
    }

    /**
     * @return ChatPermissions|null
     */
    public function getPermissions(): ?ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * @param ChatPermissions $permissions
     * @return Chat
     */
    public function setPermissions(ChatPermissions $permissions): Chat
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStickerSetName(): ?string
    {
        return $this->stickerSetName;
    }

    /**
     * @param string $stickerSetName
     * @return Chat
     */
    public function setStickerSetName(string $stickerSetName): Chat
    {
        $this->stickerSetName = $stickerSetName;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsCanSetStickerSet(): ?bool
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param bool $canSetStickerSet
     * @return Chat
     */
    public function setCanSetStickerSet(bool $canSetStickerSet): Chat
    {
        $this->canSetStickerSet = $canSetStickerSet;

        return $this;
    }
}
