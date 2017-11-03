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
        'all_members_are_administrators' => true,
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
     * @var int|string
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
     * @var string
     */
    protected $title;

    /**
     * Optional. Username, for private chats and channels if available
     *
     * @var string
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat
     *
     * @var string
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat
     *
     * @var string
     */
    protected $lastName;

    protected $allMembersAreAdministrators;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto
     */
    protected $photo;

    /**
     * Optional. Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected $description;

    /**
     * Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected $inviteLink;

    /**
     * Optional. Pinned message, for supergroups. Returned only in getChat.
     *
     * @var Message
     */
    protected $pinnedMessage;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string
     */
    protected $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool
     */
    protected $canSetStickerSet;

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|string $id
     *
     * @throws InvalidArgumentException
     */
    public function setId($id)
    {
        if (is_integer($id) || is_float($id) || is_string($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getAllMembersAreAdministrators()
    {
        return $this->allMembersAreAdministrators;
    }

    /**
     * @param mixed $allMembersAreAdministrators
     */
    public function setAllMembersAreAdministrators($allMembersAreAdministrators)
    {
        $this->allMembersAreAdministrators = $allMembersAreAdministrators;
    }

    /**
     * @return ChatPhoto
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getInviteLink()
    {
        return $this->inviteLink;
    }

    /**
     * @param string $inviteLink
     */
    public function setInviteLink($inviteLink)
    {
        $this->inviteLink = $inviteLink;
    }

    /**
     * @return Message
     */
    public function getPinnedMessage()
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message $pinnedMessage
     */
    public function setPinnedMessage($pinnedMessage)
    {
        $this->pinnedMessage = $pinnedMessage;
    }

    /**
     * @return string
     */
    public function getStickerSetName()
    {
        return $this->stickerSetName;
    }

    /**
     * @param string $stickerSetName
     */
    public function setStickerSetName($stickerSetName)
    {
        $this->stickerSetName = $stickerSetName;
    }

    /**
     * @return bool
     */
    public function isCanSetStickerSet()
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param bool $canSetStickerSet
     */
    public function setCanSetStickerSet($canSetStickerSet)
    {
        $this->canSetStickerSet = $canSetStickerSet;
    }
}
