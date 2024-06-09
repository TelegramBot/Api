<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatFullInfo
 * This object contains full information about a chat.
 *
 * @package TelegramBot\Api\Types
 */
class ChatFullInfo extends BaseType implements TypeInterface
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
        'is_forum' => true,
        'accent_color_id' => true,
        'max_reaction_count' => true,
        'photo' => ChatPhoto::class,
        'active_usernames' => true,
        'birthdate' => true,
        'business_intro' => true,
        'business_location' => true,
        'business_opening_hours' => true,
        'personal_chat' => Chat::class,
        'available_reactions' => ArrayOfReactionType::class,
        'background_custom_emoji_id' => true,
        'profile_accent_color_id' => true,
        'profile_background_custom_emoji_id' => true,
        'emoji_status_custom_emoji_id' => true,
        'emoji_status_expiration_date' => true,
        'bio' => true,
        'has_private_forwards' => true,
        'has_restricted_voice_and_video_messages' => true,
        'join_to_send_messages' => true,
        'join_by_request' => true,
        'description' => true,
        'invite_link' => true,
        'pinned_message' => Message::class,
        'permissions' => ChatPermissions::class,
        'slow_mode_delay' => true,
        'unrestrict_boost_count' => true,
        'message_auto_delete_time' => true,
        'has_aggressive_anti_spam_enabled' => true,
        'has_hidden_members' => true,
        'has_protected_content' => true,
        'has_visible_history' => true,
        'sticker_set_name' => true,
        'can_set_sticker_set' => true,
        'custom_emoji_sticker_set_name' => true,
        'linked_chat_id' => true,
        'location' => ChatLocation::class,
    ];

    /**
     * Unique identifier for this chat.
     *
     * @var int|float|string
     */
    protected $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”.
     *
     * @var string
     */
    protected $type;

    /**
     * Optional. Title, for supergroups, channels and group chats.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Optional. Username, for private chats, supergroups and channels if available.
     *
     * @var string|null
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat.
     *
     * @var string|null
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat.
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Optional. True, if the supergroup chat is a forum (has topics enabled).
     *
     * @var bool|null
     */
    protected $isForum;

    /**
     * Optional. Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header, and link preview.
     *
     * @var int|null
     */
    protected $accentColorId;

    /**
     * Optional. The maximum number of reactions that can be set on a message in the chat.
     *
     * @var int|null
     */
    protected $maxReactionCount;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto|null
     */
    protected $photo;

    /**
     * Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
     *
     * @var array|null
     */
    protected $activeUsernames;

    /**
     * Optional. For private chats, the date of birth of the user.
     *
     * @var string|null
     */
    protected $birthdate;

    /**
     * Optional. For private chats with business accounts, the intro of the business.
     *
     * @var string|null
     */
    protected $businessIntro;

    /**
     * Optional. For private chats with business accounts, the location of the business.
     *
     * @var string|null
     */
    protected $businessLocation;

    /**
     * Optional. For private chats with business accounts, the opening hours of the business.
     *
     * @var string|null
     */
    protected $businessOpeningHours;

    /**
     * Optional. For private chats, the personal channel of the user.
     *
     * @var Chat|null
     */
    protected $personalChat;

    /**
     * Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed. Returned only in getChat.
     *
     * @var array|null
     */
    protected $availableReactions;

    /**
     * Optional. Custom emoji identifier of emoji chosen by the chat for the reply header and link preview background.
     *
     * @var string|null
     */
    protected $backgroundCustomEmojiId;

    /**
     * Optional. Identifier of the accent color for the chat's profile background.
     *
     * @var int|null
     */
    protected $profileAccentColorId;

    /**
     * Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background.
     *
     * @var string|null
     */
    protected $profileBackgroundCustomEmojiId;

    /**
     * Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private chat. Returned only in getChat.
     *
     * @var string|null
     */
    protected $emojiStatusCustomEmojiId;

    /**
     * Optional. Expiration date of the emoji status of the chat or the other party in a private chat, in Unix time, if any.
     *
     * @var int|null
     */
    protected $emojiStatusExpirationDate;

    /**
     * Optional. Bio of the other party in a private chat. Returned only in getChat.
     *
     * @var string|null
     */
    protected $bio;

    /**
     * Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user.
     *
     * @var bool|null
     */
    protected $hasPrivateForwards;

    /**
     * Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasRestrictedVoiceAndVideoMessages;

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
     * Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    protected $description;

    /**
     * Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    protected $inviteLink;

    /**
     * Optional. The most recent pinned message (by sending date). Returned only in getChat.
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
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged user; in seconds. Returned only in getChat.
     *
     * @var int|null
     */
    protected $slowModeDelay;

    /**
     * Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to add in order to ignore slow mode and chat permissions.
     *
     * @var int|null
     */
    protected $unrestrictBoostCount;

    /**
     * Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat.
     *
     * @var int|null
     */
    protected $messageAutoDeleteTime;

    /**
     * Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasAggressiveAntiSpamEnabled;

    /**
     * Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasHiddenMembers;

    /**
     * Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasProtectedContent;

    /**
     * Optional. True, if new chat members will have access to old messages; available only to chat administrators. Returned only in getChat.
     *
     * @var bool|null
     */
    protected $hasVisibleHistory;

    /**
     * Optional. For supergroups, name of the group sticker set. Returned only in getChat.
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
     * Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this set can be used by all users and bots in the group.
     *
     * @var string|null
     */
    protected $customEmojiStickerSetName;

    /**
     * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
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
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return bool|null
     */
    public function getIsForum()
    {
        return $this->isForum;
    }

    /**
     * @param bool|null $isForum
     */
    public function setIsForum($isForum)
    {
        $this->isForum = $isForum;
    }

    /**
     * @return int|null
     */
    public function getAccentColorId()
    {
        return $this->accentColorId;
    }

    /**
     * @param int|null $accentColorId
     */
    public function setAccentColorId($accentColorId)
    {
        $this->accentColorId = $accentColorId;
    }

    /**
     * @return int|null
     */
    public function getMaxReactionCount()
    {
        return $this->maxReactionCount;
    }

    /**
     * @param int|null $maxReactionCount
     */
    public function setMaxReactionCount($maxReactionCount)
    {
        $this->maxReactionCount = $maxReactionCount;
    }

    /**
     * @return ChatPhoto|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto|null $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return array|null
     */
    public function getActiveUsernames()
    {
        return $this->activeUsernames;
    }

    /**
     * @param array|null $activeUsernames
     */
    public function setActiveUsernames($activeUsernames)
    {
        $this->activeUsernames = $activeUsernames;
    }

    /**
     * @return string|null
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param string|null $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string|null
     */
    public function getBusinessIntro()
    {
        return $this->businessIntro;
    }

    /**
     * @param string|null $businessIntro
     */
    public function setBusinessIntro($businessIntro)
    {
        $this->businessIntro = $businessIntro;
    }

    /**
     * @return string|null
     */
    public function getBusinessLocation()
    {
        return $this->businessLocation;
    }

    /**
     * @param string|null $businessLocation
     */
    public function setBusinessLocation($businessLocation)
    {
        $this->businessLocation = $businessLocation;
    }

    /**
     * @return string|null
     */
    public function getBusinessOpeningHours()
    {
        return $this->businessOpeningHours;
    }

    /**
     * @param string|null $businessOpeningHours
     */
    public function setBusinessOpeningHours($businessOpeningHours)
    {
        $this->businessOpeningHours = $businessOpeningHours;
    }

    /**
     * @return Chat|null
     */
    public function getPersonalChat()
    {
        return $this->personalChat;
    }

    /**
     * @param Chat|null $personalChat
     */
    public function setPersonalChat($personalChat)
    {
        $this->personalChat = $personalChat;
    }

    /**
     * @return array|null
     */
    public function getAvailableReactions()
    {
        return $this->availableReactions;
    }

    /**
     * @param array|null $availableReactions
     */
    public function setAvailableReactions($availableReactions)
    {
        $this->availableReactions = $availableReactions;
    }

    /**
     * @return string|null
     */
    public function getBackgroundCustomEmojiId()
    {
        return $this->backgroundCustomEmojiId;
    }

    /**
     * @param string|null $backgroundCustomEmojiId
     */
    public function setBackgroundCustomEmojiId($backgroundCustomEmojiId)
    {
        $this->backgroundCustomEmojiId = $backgroundCustomEmojiId;
    }

    /**
     * @return int|null
     */
    public function getProfileAccentColorId()
    {
        return $this->profileAccentColorId;
    }

    /**
     * @param int|null $profileAccentColorId
     */
    public function setProfileAccentColorId($profileAccentColorId)
    {
        $this->profileAccentColorId = $profileAccentColorId;
    }

    /**
     * @return string|null
     */
    public function getProfileBackgroundCustomEmojiId()
    {
        return $this->profileBackgroundCustomEmojiId;
    }

    /**
     * @param string|null $profileBackgroundCustomEmojiId
     */
    public function setProfileBackgroundCustomEmojiId($profileBackgroundCustomEmojiId)
    {
        $this->profileBackgroundCustomEmojiId = $profileBackgroundCustomEmojiId;
    }

    /**
     * @return string|null
     */
    public function getEmojiStatusCustomEmojiId()
    {
        return $this->emojiStatusCustomEmojiId;
    }

    /**
     * @param string|null $emojiStatusCustomEmojiId
     */
    public function setEmojiStatusCustomEmojiId($emojiStatusCustomEmojiId)
    {
        $this->emojiStatusCustomEmojiId = $emojiStatusCustomEmojiId;
    }

    /**
     * @return int|null
     */
    public function getEmojiStatusExpirationDate()
    {
        return $this->emojiStatusExpirationDate;
    }

    /**
     * @param int|null $emojiStatusExpirationDate
     */
    public function setEmojiStatusExpirationDate($emojiStatusExpirationDate)
    {
        $this->emojiStatusExpirationDate = $emojiStatusExpirationDate;
    }

    /**
     * @return string|null
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return bool|null
     */
    public function getHasPrivateForwards()
    {
        return $this->hasPrivateForwards;
    }

    /**
     * @param bool|null $hasPrivateForwards
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
     * @param bool|null $hasRestrictedVoiceAndVideoMessages
     */
    public function setHasRestrictedVoiceAndVideoMessages($hasRestrictedVoiceAndVideoMessages)
    {
        $this->hasRestrictedVoiceAndVideoMessages = $hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @return bool|null
     */
    public function getJoinToSendMessages()
    {
        return $this->joinToSendMessages;
    }

    /**
     * @param bool|null $joinToSendMessages
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
     * @param bool|null $joinByRequest
     */
    public function setJoinByRequest($joinByRequest)
    {
        $this->joinByRequest = $joinByRequest;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getInviteLink()
    {
        return $this->inviteLink;
    }

    /**
     * @param string|null $inviteLink
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
     * @param Message|null $pinnedMessage
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
     * @param ChatPermissions|null $permissions
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
     * @param int|null $slowModeDelay
     */
    public function setSlowModeDelay($slowModeDelay)
    {
        $this->slowModeDelay = $slowModeDelay;
    }

    /**
     * @return int|null
     */
    public function getUnrestrictBoostCount()
    {
        return $this->unrestrictBoostCount;
    }

    /**
     * @param int|null $unrestrictBoostCount
     */
    public function setUnrestrictBoostCount($unrestrictBoostCount)
    {
        $this->unrestrictBoostCount = $unrestrictBoostCount;
    }

    /**
     * @return int|null
     */
    public function getMessageAutoDeleteTime()
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @param int|null $messageAutoDeleteTime
     */
    public function setMessageAutoDeleteTime($messageAutoDeleteTime)
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
    }

    /**
     * @return bool|null
     */
    public function getHasAggressiveAntiSpamEnabled()
    {
        return $this->hasAggressiveAntiSpamEnabled;
    }

    /**
     * @param bool|null $hasAggressiveAntiSpamEnabled
     */
    public function setHasAggressiveAntiSpamEnabled($hasAggressiveAntiSpamEnabled)
    {
        $this->hasAggressiveAntiSpamEnabled = $hasAggressiveAntiSpamEnabled;
    }

    /**
     * @return bool|null
     */
    public function getHasHiddenMembers()
    {
        return $this->hasHiddenMembers;
    }

    /**
     * @param bool|null $hasHiddenMembers
     */
    public function setHasHiddenMembers($hasHiddenMembers)
    {
        $this->hasHiddenMembers = $hasHiddenMembers;
    }

    /**
     * @return bool|null
     */
    public function getHasProtectedContent()
    {
        return $this->hasProtectedContent;
    }

    /**
     * @param bool|null $hasProtectedContent
     */
    public function setHasProtectedContent($hasProtectedContent)
    {
        $this->hasProtectedContent = $hasProtectedContent;
    }

    /**
     * @return bool|null
     */
    public function getHasVisibleHistory()
    {
        return $this->hasVisibleHistory;
    }

    /**
     * @param bool|null $hasVisibleHistory
     */
    public function setHasVisibleHistory($hasVisibleHistory)
    {
        $this->hasVisibleHistory = $hasVisibleHistory;
    }

    /**
     * @return string|null
     */
    public function getStickerSetName()
    {
        return $this->stickerSetName;
    }

    /**
     * @param string|null $stickerSetName
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
     * @param bool|null $canSetStickerSet
     */
    public function setCanSetStickerSet($canSetStickerSet)
    {
        $this->canSetStickerSet = $canSetStickerSet;
    }

    /**
     * @return string|null
     */
    public function getCustomEmojiStickerSetName()
    {
        return $this->customEmojiStickerSetName;
    }

    /**
     * @param string|null $customEmojiStickerSetName
     */
    public function setCustomEmojiStickerSetName($customEmojiStickerSetName)
    {
        $this->customEmojiStickerSetName = $customEmojiStickerSetName;
    }

    /**
     * @return int|null
     */
    public function getLinkedChatId()
    {
        return $this->linkedChatId;
    }

    /**
     * @param int|null $linkedChatId
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
     * @param ChatLocation|null $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}
