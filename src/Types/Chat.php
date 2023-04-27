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
    protected static $requiredParams = ['id', 'type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
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
        'location' => ChatLocation::class,
        'join_to_send_messages' => true,
        'join_by_request' => true,
        'message_auto_delete_time' => true,
        'has_protected_content' => true,
        'is_forum' => true,
        'active_usernames' => true,
        'emoji_status_custom_emoji_id' => true,
        'has_private_forwards' => true,
        'has_restricted_voice_and_video_messages' => true,
    ];

    /**
     * Unique identifier for this chat, not exceeding 1e13 by absolute value
     *
     * @var int|float|string
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
     * Optional. Bio of the other party in a private chat. Returned only in getChat
     *
     * @var string|null
     */
    protected $bio;

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
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged
     * user. Returned only in getChat.
     *
     * @var int|null
     */
    protected $slowModeDelay;

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
     * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice
     * versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64
     * bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
     *
     * @var int|null
     */
    protected $linkedChatId;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
     *
     * @var ChatLocation|null
     */
    protected $location;

    /**
     * Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $joinToSendMessages;

    /**
     * Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $joinByRequest;

    /**
     * Optional. Time after which all messages sent to the chat will be automatically deleted; in seconds. Returned
     * only in getChat.
     *
     * @var int|null
     */
    protected $messageAutoDeleteTime;

    /**
     * 	Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasProtectedContent;

    /**
     * Optional. True, if the supergroup chat is a forum (has topics enabled)
     *
     * @var bool|null
     */
    protected $isForum;

    /**
     * Optional. If non-empty, the list of all active chat usernames;
     * for private chats, supergroups and channels. Returned only in getChat.
     *
     * @var array[]|null
     */
    protected $activeUsernames;

    /**
     * Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in getChat.
     *
     * @var string|null
     */
    protected $emojiStatusCustomEmojiId;

    /**
     * Optional. True, if privacy settings of the other party in the private chat allows
     * to use tg://user?id=<user_id> links only in chats with the user.
     * Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasPrivateForwards;

    /**
     * Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat.
     * Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasRestrictedVoiceAndVideoMessages;

    /**
     * @return int|float|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return void
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
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return null|string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return ChatPhoto|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto $photo
     * @return void
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return null|string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     * @return void
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getInviteLink()
    {
        return $this->inviteLink;
    }

    /**
     * @param string $inviteLink
     * @return void
     */
    public function setInviteLink($inviteLink)
    {
        $this->inviteLink = $inviteLink;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage()
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message $pinnedMessage
     * @return void
     */
    public function setPinnedMessage($pinnedMessage)
    {
        $this->pinnedMessage = $pinnedMessage;
    }

    /**
     * @return ChatPermissions|null
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param ChatPermissions $permissions
     * @return void
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return int|null
     */
    public function getSlowModeDelay()
    {
        return $this->slowModeDelay;
    }

    /**
     * @param int $slowModeDelay
     * @return void
     */
    public function setSlowModeDelay($slowModeDelay)
    {
        $this->slowModeDelay = $slowModeDelay;
    }

    /**
     * @return null|string
     */
    public function getStickerSetName()
    {
        return $this->stickerSetName;
    }

    /**
     * @param string $stickerSetName
     * @return void
     */
    public function setStickerSetName($stickerSetName)
    {
        $this->stickerSetName = $stickerSetName;
    }

    /**
     * @return bool|null
     */
    public function getCanSetStickerSet()
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param bool $canSetStickerSet
     * @return void
     */
    public function setCanSetStickerSet($canSetStickerSet)
    {
        $this->canSetStickerSet = $canSetStickerSet;
    }

    /**
     * @return int|null
     */
    public function getLinkedChatId()
    {
        return $this->linkedChatId;
    }

    /**
     * @param int $linkedChatId
     * @return void
     */
    public function setLinkedChatId($linkedChatId)
    {
        $this->linkedChatId = $linkedChatId;
    }

    /**
     * @return ChatLocation|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param ChatLocation $location
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return bool|null
     */
    public function getJoinToSendMessages()
    {
        return $this->joinToSendMessages;
    }

    /**
     * @param bool $joinToSendMessages
     * @return void
     */
    public function setJoinToSendMessages($joinToSendMessages)
    {
        $this->joinToSendMessages = $joinToSendMessages;
    }

    /**
     * @return bool|null
     */
    public function getJoinByRequest()
    {
        return $this->joinByRequest;
    }

    /**
     * @param bool $joinByRequest
     * @return void
     */
    public function setJoinByRequest($joinByRequest)
    {
        $this->joinByRequest = $joinByRequest;
    }

    /**
     * @return int|null
     */
    public function getMessageAutoDeleteTime()
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @param int $messageAutoDeleteTime
     * @return void
     */
    public function setMessageAutoDeleteTime($messageAutoDeleteTime)
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
    }

    /**
     * @return bool|null
     */
    public function getHasProtectedContent()
    {
        return $this->hasProtectedContent;
    }

    /**
     * @param bool $hasProtectedContent
     * @return void
     */
    public function setHasProtectedContent($hasProtectedContent)
    {
        $this->hasProtectedContent = $hasProtectedContent;
    }

    /**
     * @return bool|null
     */
    public function getIsForum()
    {
        return $this->isForum;
    }

    /**
     * @param bool $isForum
     * @return void
     */
    public function setIsForum($isForum)
    {
        $this->isForum = $isForum;
    }

    /**
     * @return array[]|null
     *
     * @psalm-return array<array>|null
     */
    public function getActiveUsernames()
    {
        return $this->activeUsernames;
    }

    /**
     * @param array $activeUsernames
     * @return void
     */
    public function setActiveUsernames($activeUsernames)
    {
        $this->activeUsernames = $activeUsernames;
    }

    /**
     * @return null|string
     */
    public function getEmojiStatusCustomEmojiId()
    {
        return $this->emojiStatusCustomEmojiId;
    }

    /**
     * @param string $emojiStatusCustomEmojiId
     * @return void
     */
    public function setEmojiStatusCustomEmojiId($emojiStatusCustomEmojiId)
    {
        $this->emojiStatusCustomEmojiId = $emojiStatusCustomEmojiId;
    }

    /**
     * @return bool|null
     */
    public function getHasPrivateForwards()
    {
        return $this->hasPrivateForwards;
    }

    /**
     * @param bool $hasPrivateForwards
     * @return void
     */
    public function setHasPrivateForwards($hasPrivateForwards)
    {
        $this->hasPrivateForwards = $hasPrivateForwards;
    }

    /**
     * @return bool|null
     */
    public function getHasRestrictedVoiceAndVideoMessages()
    {
        return $this->hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @param bool $hasRestrictedVoiceAndVideoMessages
     * @return void
     */
    public function setHasRestrictedVoiceAndVideoMessages($hasRestrictedVoiceAndVideoMessages)
    {
        $this->hasRestrictedVoiceAndVideoMessages = $hasRestrictedVoiceAndVideoMessages;
    }
}
