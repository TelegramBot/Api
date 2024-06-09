<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Payments\Invoice;
use TelegramBot\Api\Types\Payments\SuccessfulPayment;

/**
 * Class Message
 * This object represents a message.
 *
 * @package TelegramBot\Api\Types
 */
class Message extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['message_id', 'date', 'chat'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'message_id' => true,
        'message_thread_id' => true,
        'from' => User::class,
        'sender_chat' => Chat::class,
        'sender_boost_count' => true,
        'sender_business_bot' => User::class,
        'date' => true,
        'business_connection_id' => true,
        'chat' => Chat::class,
        'forward_origin' => MessageOrigin::class,
        'is_topic_message' => true,
        'is_automatic_forward' => true,
        'reply_to_message' => self::class,
        'external_reply' => ExternalReplyInfo::class,
        'quote' => TextQuote::class,
        'reply_to_story' => Story::class,
        'via_bot' => User::class,
        'edit_date' => true,
        'has_protected_content' => true,
        'is_from_offline' => true,
        'media_group_id' => true,
        'author_signature' => true,
        'text' => true,
        'entities' => ArrayOfMessageEntity::class,
        'link_preview_options' => LinkPreviewOptions::class,
        'effect_id' => true,
        'animation' => Animation::class,
        'audio' => Audio::class,
        'document' => Document::class,
        'photo' => ArrayOfPhotoSize::class,
        'sticker' => Sticker::class,
        'story' => Story::class,
        'video' => Video::class,
        'video_note' => VideoNote::class,
        'voice' => Voice::class,
        'caption' => true,
        'caption_entities' => ArrayOfMessageEntity::class,
        'show_caption_above_media' => true,
        'has_media_spoiler' => true,
        'contact' => Contact::class,
        'dice' => Dice::class,
        'game' => Game::class,
        'poll' => Poll::class,
        'venue' => Venue::class,
        'location' => Location::class,
        'new_chat_members' => ArrayOfUser::class,
        'left_chat_member' => User::class,
        'new_chat_title' => true,
        'new_chat_photo' => ArrayOfPhotoSize::class,
        'delete_chat_photo' => true,
        'group_chat_created' => true,
        'supergroup_chat_created' => true,
        'channel_chat_created' => true,
        'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
        'migrate_to_chat_id' => true,
        'migrate_from_chat_id' => true,
        'pinned_message' => MaybeInaccessibleMessage::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
        'users_shared' => UsersShared::class,
        'chat_shared' => ChatShared::class,
        'connected_website' => true,
        'write_access_allowed' => WriteAccessAllowed::class,
//        'passport_data' => PassportData::class,
        'proximity_alert_triggered' => ProximityAlertTriggered::class,
        'boost_added' => ChatBoostAdded::class,
        'chat_background_set' => ChatBackground::class,
        'forum_topic_created' => ForumTopicCreated::class,
        'forum_topic_edited' => ForumTopicEdited::class,
        'forum_topic_closed' => ForumTopicClosed::class,
        'forum_topic_reopened' => ForumTopicReopened::class,
        'general_forum_topic_hidden' => GeneralForumTopicHidden::class,
        'general_forum_topic_unhidden' => GeneralForumTopicUnhidden::class,
        'giveaway_created' => GiveawayCreated::class,
        'giveaway' => Giveaway::class,
        'giveaway_winners' => GiveawayWinners::class,
        'giveaway_completed' => GiveawayCompleted::class,
        'video_chat_scheduled' => VideoChatScheduled::class,
        'video_chat_started' => VideoChatStarted::class,
        'video_chat_ended' => VideoChatEnded::class,
        'video_chat_participants_invited' => VideoChatParticipantsInvited::class,
        'web_app_data' => WebAppData::class,
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    /**
     * Unique message identifier inside this chat
     *
     * @var int
     */
    protected $messageId;

    /**
     * Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
     *
     * @var int|null
     */
    protected $messageThreadId;

    /**
     * Optional. Sender of the message; empty for messages sent to channels. For backward compatibility,
     * the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     *
     * @var \TelegramBot\Api\Types\User|null
     */
    protected $from;

    /**
     * Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts,
     * the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group.
     * For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     *
     * @var \TelegramBot\Api\Types\Chat|null
     */
    protected $senderChat;

    /**
     * Optional. If the sender of the message boosted the chat, the number of boosts added by the user
     *
     * @var int|null
     */
    protected $senderBoostCount;

    /**
     * Optional. The bot that actually sent the message on behalf of the business account.
     * Available only for outgoing messages sent on behalf of the connected business account.
     *
     * @var \TelegramBot\Api\Types\User|null
     */
    protected $senderBusinessBot;

    /**
     * Date the message was sent in Unix time. It is always a positive number, representing a valid date.
     *
     * @var int
     */
    protected $date;

    /**
     * Optional. Unique identifier of the business connection from which the message was received.
     * If non-empty, the message belongs to a chat of the corresponding business account that is independent
     * from any potential bot chat which might share the same identifier.
     *
     * @var string|null
     */
    protected $businessConnectionId;

    /**
     * Chat the message belongs to
     *
     * @var \TelegramBot\Api\Types\Chat
     */
    protected $chat;

    /**
     * Optional. Information about the original message for forwarded messages
     *
     * @var \TelegramBot\Api\Types\MessageOrigin|null
     */
    protected $forwardOrigin;

    /**
     * Optional. True, if the message is sent to a forum topic
     *
     * @var bool|null
     */
    protected $isTopicMessage;

    /**
     * Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
     *
     * @var bool|null
     */
    protected $isAutomaticForward;

    /**
     * Optional. For replies in the same chat and message thread, the original message.
     * Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     *
     * @var \TelegramBot\Api\Types\Message|null
     */
    protected $replyToMessage;

    /**
     * Optional. Information about the message that is being replied to, which may come from another chat or forum topic
     *
     * @var \TelegramBot\Api\Types\ExternalReplyInfo|null
     */
    protected $externalReply;

    /**
     * Optional. For replies that quote part of the original message, the quoted part of the message
     *
     * @var \TelegramBot\Api\Types\TextQuote|null
     */
    protected $quote;

    /**
     * Optional. For replies to a story, the original story
     *
     * @var \TelegramBot\Api\Types\Story|null
     */
    protected $replyToStory;

    /**
     * Optional. Bot through which the message was sent
     *
     * @var \TelegramBot\Api\Types\User|null
     */
    protected $viaBot;

    /**
     * Optional. Date the message was last edited in Unix time
     *
     * @var int|null
     */
    protected $editDate;

    /**
     * Optional. True, if the message can't be forwarded
     *
     * @var bool|null
     */
    protected $hasProtectedContent;

    /**
     * Optional. True, if the message was sent by an implicit action, for example, as an away or a greeting business message,
     * or as a scheduled message
     *
     * @var bool|null
     */
    protected $isFromOffline;

    /**
     * Optional. The unique identifier of a media message group this message belongs to
     *
     * @var string|null
     */
    protected $mediaGroupId;

    /**
     * Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
     *
     * @var string|null
     */
    protected $authorSignature;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string|null
     */
    protected $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     *
     * @var \TelegramBot\Api\Types\ArrayOfMessageEntity|null
     */
    protected $entities;

    /**
     * Optional. Options used for link preview generation for the message, if it is a text message and link preview options were changed
     *
     * @var \TelegramBot\Api\Types\LinkPreviewOptions|null
     */
    protected $linkPreviewOptions;

    /**
     * Optional. Unique identifier of the message effect added to the message
     *
     * @var string|null
     */
    protected $effectId;

    /**
     * Optional. Message is an animation, information about the animation.
     * For backward compatibility, when this field is set, the document field will also be set
     *
     * @var \TelegramBot\Api\Types\Animation|null
     */
    protected $animation;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var \TelegramBot\Api\Types\Audio|null
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var \TelegramBot\Api\Types\Document|null
     */
    protected $document;

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @var \TelegramBot\Api\Types\ArrayOfPhotoSize|null
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var \TelegramBot\Api\Types\Sticker|null
     */
    protected $sticker;

    /**
     * Optional. Message is a forwarded story
     *
     * @var \TelegramBot\Api\Types\Story|null
     */
    protected $story;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var \TelegramBot\Api\Types\Video|null
     */
    protected $video;

    /**
     * Optional. Message is a video note, information about the video message
     *
     * @var \TelegramBot\Api\Types\VideoNote|null
     */
    protected $videoNote;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var \TelegramBot\Api\Types\Voice|null
     */
    protected $voice;

    /**
     * Optional. Caption for the animation, audio, document, photo, video or voice
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     *
     * @var \TelegramBot\Api\Types\ArrayOfMessageEntity|null
     */
    protected $captionEntities;

    /**
     * Optional. True, if the caption must be shown above the message media
     *
     * @var bool|null
     */
    protected $showCaptionAboveMedia;

    /**
     * Optional. True, if the message media is covered by a spoiler animation
     *
     * @var bool|null
     */
    protected $hasMediaSpoiler;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var \TelegramBot\Api\Types\Contact|null
     */
    protected $contact;

    /**
     * Optional. Message is a dice with random value
     *
     * @var \TelegramBot\Api\Types\Dice|null
     */
    protected $dice;

    /**
     * Optional. Message is a game, information about the game
     *
     * @var \TelegramBot\Api\Types\Game|null
     */
    protected $game;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var \TelegramBot\Api\Types\Poll|null
     */
    protected $poll;

    /**
     * Optional. Message is a venue, information about the venue.
     * For backward compatibility, when this field is set, the location field will also be set
     *
     * @var \TelegramBot\Api\Types\Venue|null
     */
    protected $venue;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var \TelegramBot\Api\Types\Location|null
     */
    protected $location;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     *
     * @var \TelegramBot\Api\Types\ArrayOfUser|null
     */
    protected $newChatMembers;

    /**
     * Optional. A member was removed from the group, information about them (this member may be the bot itself)
     *
     * @var \TelegramBot\Api\Types\User|null
     */
    protected $leftChatMember;

    /**
     * Optional. A chat title was changed to this value
     *
     * @var string|null
     */
    protected $newChatTitle;

    /**
     * Optional. A chat photo was change to this value
     *
     * @var \TelegramBot\Api\Types\ArrayOfPhotoSize|null
     */
    protected $newChatPhoto;

    /**
     * Optional. Service message: the chat photo was deleted
     *
     * @var bool|null
     */
    protected $deleteChatPhoto;

    /**
     * Optional. Service message: the group has been created
     *
     * @var bool|null
     */
    protected $groupChatCreated;

    /**
     * Optional. Service message: the supergroup has been created.
     * This field can't be received in a message coming through updates,
     * because bot can't be a member of a supergroup when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     *
     * @var bool|null
     */
    protected $supergroupChatCreated;

    /**
     * Optional. Service message: the channel has been created.
     * This field can't be received in a message coming through updates,
     * because bot can't be a member of a channel when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a channel.
     *
     * @var bool|null
     */
    protected $channelChatCreated;

    /**
     * Optional. Service message: auto-delete timer settings changed in the chat
     *
     * @var \TelegramBot\Api\Types\MessageAutoDeleteTimerChanged|null
     */
    protected $messageAutoDeleteTimerChanged;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier.
     * This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    protected $migrateToChatId;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier.
     * This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    protected $migrateFromChatId;

    /**
     * Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     *
     * @var \TelegramBot\Api\Types\MaybeInaccessibleMessage|null
     */
    protected $pinnedMessage;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice
     *
     * @var Invoice
     */
    protected $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment
     *
     * @var SuccessfulPayment
     */
    protected $successfulPayment;

    /**
     * Optional. Service message: users were shared with the bot
     *
     * @var \TelegramBot\Api\Types\UsersShared|null
     */
    protected $usersShared;

    /**
     * Optional. Service message: a chat was shared with the bot
     *
     * @var \TelegramBot\Api\Types\ChatShared|null
     */
    protected $chatShared;

    /**
     * Optional. The domain name of the website on which the user has logged in
     *
     * @var string|null
     */
    protected $connectedWebsite;

    /**
     * Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu,
     * launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
     *
     * @var \TelegramBot\Api\Types\WriteAccessAllowed|null
     */
    protected $writeAccessAllowed;

    /**
     * Optional. Telegram Passport data
     *
     * @var \TelegramBot\Api\Types\PassportData|null
     */
    protected $passportData;

    /**
     * Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location
     *
     * @var \TelegramBot\Api\Types\ProximityAlertTriggered|null
     */
    protected $proximityAlertTriggered;

    /**
     * Optional. Service message: user boosted the chat
     *
     * @var \TelegramBot\Api\Types\ChatBoostAdded|null
     */
    protected $boostAdded;

    /**
     * Optional. Service message: chat background set
     *
     * @var \TelegramBot\Api\Types\ChatBackground|null
     */
    protected $chatBackgroundSet;

    /**
     * Optional. Service message: forum topic created
     *
     * @var \TelegramBot\Api\Types\ForumTopicCreated|null
     */
    protected $forumTopicCreated;

    /**
     * Optional. Service message: forum topic edited
     *
     * @var \TelegramBot\Api\Types\ForumTopicEdited|null
     */
    protected $forumTopicEdited;

    /**
     * Optional. Service message: forum topic closed
     *
     * @var \TelegramBot\Api\Types\ForumTopicClosed|null
     */
    protected $forumTopicClosed;

    /**
     * Optional. Service message: forum topic reopened
     *
     * @var \TelegramBot\Api\Types\ForumTopicReopened|null
     */
    protected $forumTopicReopened;

    /**
     * Optional. Service message: the 'General' forum topic hidden
     *
     * @var \TelegramBot\Api\Types\GeneralForumTopicHidden|null
     */
    protected $generalForumTopicHidden;

    /**
     * Optional. Service message: the 'General' forum topic unhidden
     *
     * @var \TelegramBot\Api\Types\GeneralForumTopicUnhidden|null
     */
    protected $generalForumTopicUnhidden;

    /**
     * Optional. Service message: a scheduled giveaway was created
     *
     * @var \TelegramBot\Api\Types\GiveawayCreated|null
     */
    protected $giveawayCreated;

    /**
     * Optional. The message is a scheduled giveaway message
     *
     * @var \TelegramBot\Api\Types\Giveaway|null
     */
    protected $giveaway;

    /**
     * Optional. A giveaway with public winners was completed
     *
     * @var \TelegramBot\Api\Types\GiveawayWinners|null
     */
    protected $giveawayWinners;

    /**
     * Optional. Service message: a giveaway without public winners was completed
     *
     * @var \TelegramBot\Api\Types\GiveawayCompleted|null
     */
    protected $giveawayCompleted;

    /**
     * Optional. Service message: video chat scheduled
     *
     * @var \TelegramBot\Api\Types\VideoChatScheduled|null
     */
    protected $videoChatScheduled;

    /**
     * Optional. Service message: video chat started
     *
     * @var \TelegramBot\Api\Types\VideoChatStarted|null
     */
    protected $videoChatStarted;

    /**
     * Optional. Service message: video chat ended
     *
     * @var \TelegramBot\Api\Types\VideoChatEnded|null
     */
    protected $videoChatEnded;

    /**
     * Optional. Service message: new participants invited to a video chat
     *
     * @var \TelegramBot\Api\Types\VideoChatParticipantsInvited|null
     */
    protected $videoChatParticipantsInvited;

    /**
     * Optional. Service message: data sent by a Web App
     *
     * @var \TelegramBot\Api\Types\WebAppData|null
     */
    protected $webAppData;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons
     *
     * @var \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup|null
     */
    protected $replyMarkup;

    /**
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param mixed $messageId
     * @return void
     * @throws InvalidArgumentException
     */
    public function setMessageId($messageId)
    {
        if (is_integer($messageId) || is_float($messageId)) {
            $this->messageId = $messageId;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return int|null
     */
    public function getMessageThreadId()
    {
        return $this->messageThreadId;
    }

    /**
     * @param int|null $messageThreadId
     * @return void
     */
    public function setMessageThreadId($messageThreadId)
    {
        $this->messageThreadId = $messageThreadId;
    }

    /**
     * @return User|null
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param User $from
     * @return void
     */
    public function setFrom(User $from)
    {
        $this->from = $from;
    }

    /**
     * @return Chat|null
     */
    public function getSenderChat()
    {
        return $this->senderChat;
    }

    /**
     * @param Chat $senderChat
     * @return void
     */
    public function setSenderChat(Chat $senderChat)
    {
        $this->senderChat = $senderChat;
    }

    /**
     * @return int|null
     */
    public function getSenderBoostCount()
    {
        return $this->senderBoostCount;
    }

    /**
     * @param int|null $senderBoostCount
     */
    public function setSenderBoostCount($senderBoostCount)
    {
        $this->senderBoostCount = $senderBoostCount;
    }

    /**
     * @return User|null
     */
    public function getSenderBusinessBot()
    {
        return $this->senderBusinessBot;
    }

    /**
     * @param User|null $senderBusinessBot
     */
    public function setSenderBusinessBot($senderBusinessBot)
    {
        $this->senderBusinessBot = $senderBusinessBot;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return void
     * @throws InvalidArgumentException
     */
    public function setDate($date)
    {
        if (is_int($date)) {
            $this->date = $date;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string|null
     */
    public function getBusinessConnectionId()
    {
        return $this->businessConnectionId;
    }

    /**
     * @param string|null $businessConnectionId
     */
    public function setBusinessConnectionId($businessConnectionId)
    {
        $this->businessConnectionId = $businessConnectionId;
    }

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return MessageOrigin|null
     */
    public function getForwardOrigin()
    {
        return $this->forwardOrigin;
    }

    /**
     * @param MessageOrigin|null $forwardOrigin
     */
    public function setForwardOrigin($forwardOrigin)
    {
        $this->forwardOrigin = $forwardOrigin;
    }

    /**
     * @return bool|null
     */
    public function getIsTopicMessage()
    {
        return $this->isTopicMessage;
    }

    /**
     * @param bool|null $isTopicMessage
     */
    public function setIsTopicMessage($isTopicMessage)
    {
        $this->isTopicMessage = $isTopicMessage;
    }

    /**
     * @return bool|null
     */
    public function getIsAutomaticForward()
    {
        return $this->isAutomaticForward;
    }

    /**
     * @param bool|null $isAutomaticForward
     */
    public function setIsAutomaticForward($isAutomaticForward)
    {
        $this->isAutomaticForward = $isAutomaticForward;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage()
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message|null $replyToMessage
     */
    public function setReplyToMessage($replyToMessage)
    {
        $this->replyToMessage = $replyToMessage;
    }

    /**
     * @return ExternalReplyInfo|null
     */
    public function getExternalReply()
    {
        return $this->externalReply;
    }

    /**
     * @param ExternalReplyInfo|null $externalReply
     */
    public function setExternalReply($externalReply)
    {
        $this->externalReply = $externalReply;
    }

    /**
     * @return TextQuote|null
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param TextQuote|null $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }

    /**
     * @return Story|null
     */
    public function getReplyToStory()
    {
        return $this->replyToStory;
    }

    /**
     * @param Story|null $replyToStory
     */
    public function setReplyToStory($replyToStory)
    {
        $this->replyToStory = $replyToStory;
    }

    /**
     * @return User|null
     */
    public function getViaBot()
    {
        return $this->viaBot;
    }

    /**
     * @param User|null $viaBot
     */
    public function setViaBot($viaBot)
    {
        $this->viaBot = $viaBot;
    }

    /**
     * @return int|null
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * @param mixed $editDate
     * @return void
     * @throws InvalidArgumentException
     */
    public function setEditDate($editDate)
    {
        if (is_int($editDate)) {
            $this->editDate = $editDate;
        } else {
            throw new InvalidArgumentException();
        }
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
    public function getIsFromOffline()
    {
        return $this->isFromOffline;
    }

    /**
     * @param bool|null $isFromOffline
     */
    public function setIsFromOffline($isFromOffline)
    {
        $this->isFromOffline = $isFromOffline;
    }

    /**
     * @return string|null
     */
    public function getMediaGroupId()
    {
        return $this->mediaGroupId;
    }

    /**
     * @param string|null $mediaGroupId
     */
    public function setMediaGroupId($mediaGroupId)
    {
        $this->mediaGroupId = $mediaGroupId;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature()
    {
        return $this->authorSignature;
    }

    /**
     * @param string|null $authorSignature
     */
    public function setAuthorSignature($authorSignature)
    {
        $this->authorSignature = $authorSignature;
    }

    /**
     * @return string|null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param array|null $entities
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions()
    {
        return $this->linkPreviewOptions;
    }

    /**
     * @param LinkPreviewOptions|null $linkPreviewOptions
     */
    public function setLinkPreviewOptions($linkPreviewOptions)
    {
        $this->linkPreviewOptions = $linkPreviewOptions;
    }

    /**
     * @return string|null
     */
    public function getEffectId()
    {
        return $this->effectId;
    }

    /**
     * @param string|null $effectId
     */
    public function setEffectId($effectId)
    {
        $this->effectId = $effectId;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     */
    public function setAnimation($animation)
    {
        $this->animation = $animation;
    }

    /**
     * @return Audio|null
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param Audio|null $audio
     */
    public function setAudio($audio)
    {
        $this->audio = $audio;
    }

    /**
     * @return Document|null
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param Document|null $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param array|null $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     */
    public function setSticker($sticker)
    {
        $this->sticker = $sticker;
    }

    /**
     * @return Story|null
     */
    public function getStory()
    {
        return $this->story;
    }

    /**
     * @param Story|null $story
     */
    public function setStory($story)
    {
        $this->story = $story;
    }

    /**
     * @return Video|null
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote()
    {
        return $this->videoNote;
    }

    /**
     * @param VideoNote|null $videoNote
     */
    public function setVideoNote($videoNote)
    {
        $this->videoNote = $videoNote;
    }

    /**
     * @return Voice|null
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * @param Voice|null $voice
     */
    public function setVoice($voice)
    {
        $this->voice = $voice;
    }

    /**
     * @return null|string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return ArrayOfMessageEntity|null
     */
    public function getCaptionEntities()
    {
        return $this->captionEntities;
    }

    /**
     * @param ArrayOfMessageEntity|null $captionEntities
     */
    public function setCaptionEntities($captionEntities)
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia()
    {
        return $this->showCaptionAboveMedia;
    }

    /**
     * @param bool|null $showCaptionAboveMedia
     */
    public function setShowCaptionAboveMedia($showCaptionAboveMedia)
    {
        $this->showCaptionAboveMedia = $showCaptionAboveMedia;
    }

    /**
     * @return bool|null
     */
    public function getHasMediaSpoiler()
    {
        return $this->hasMediaSpoiler;
    }

    /**
     * @param bool|null $hasMediaSpoiler
     */
    public function setHasMediaSpoiler($hasMediaSpoiler)
    {
        $this->hasMediaSpoiler = $hasMediaSpoiler;
    }

    /**
     * @return Contact|null
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Dice|null
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * @param Dice|null $dice
     */
    public function setDice($dice)
    {
        $this->dice = $dice;
    }

    /**
     * @return Game|null
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }

    /**
     * @return Poll|null
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * @param Poll|null $poll
     */
    public function setPoll($poll)
    {
        $this->poll = $poll;
    }

    /**
     * @return Venue|null
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param Venue|null $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getNewChatMembers()
    {
        return $this->newChatMembers;
    }

    /**
     * @param \TelegramBot\Api\Types\User[]|null $newChatMembers
     * @return void
     */
    public function setNewChatMembers($newChatMembers)
    {
        $this->newChatMembers = $newChatMembers;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember()
    {
        return $this->leftChatMember;
    }

    /**
     * @param User $leftChatMember
     * @return void
     */
    public function setLeftChatMember($leftChatMember)
    {
        $this->leftChatMember = $leftChatMember;
    }

    /**
     * @return null|string
     */
    public function getNewChatTitle()
    {
        return $this->newChatTitle;
    }

    /**
     * @param string $newChatTitle
     * @return void
     */
    public function setNewChatTitle($newChatTitle)
    {
        $this->newChatTitle = $newChatTitle;
    }

    public function getNewChatPhoto()
    {
        return $this->newChatPhoto;
    }

    /**
     * @param PhotoSize[]|null $newChatPhoto
     * @return void
     */
    public function setNewChatPhoto($newChatPhoto)
    {
        $this->newChatPhoto = $newChatPhoto;
    }

    /**
     * @return bool|null
     */
    public function isDeleteChatPhoto()
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param mixed $deleteChatPhoto
     * @return void
     */
    public function setDeleteChatPhoto($deleteChatPhoto)
    {
        $this->deleteChatPhoto = (bool) $deleteChatPhoto;
    }

    /**
     * @return bool|null
     */
    public function isGroupChatCreated()
    {
        return $this->groupChatCreated;
    }

    /**
     * @param mixed $groupChatCreated
     * @return void
     */
    public function setGroupChatCreated($groupChatCreated)
    {
        $this->groupChatCreated = (bool) $groupChatCreated;
    }

    /**
     * @return bool|null
     */
    public function isSupergroupChatCreated()
    {
        return $this->supergroupChatCreated;
    }

    /**
     * @param bool $supergroupChatCreated
     * @return void
     */
    public function setSupergroupChatCreated($supergroupChatCreated)
    {
        $this->supergroupChatCreated = $supergroupChatCreated;
    }

    /**
     * @return bool|null
     */
    public function isChannelChatCreated()
    {
        return $this->channelChatCreated;
    }

    /**
     * @param bool $channelChatCreated
     * @return void
     */
    public function setChannelChatCreated($channelChatCreated)
    {
        $this->channelChatCreated = $channelChatCreated;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId()
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int $migrateToChatId
     * @return void
     */
    public function setMigrateToChatId($migrateToChatId)
    {
        $this->migrateToChatId = $migrateToChatId;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId()
    {
        return $this->migrateFromChatId;
    }

    /**
     * @param int $migrateFromChatId
     * @return void
     */
    public function setMigrateFromChatId($migrateFromChatId)
    {
        $this->migrateFromChatId = $migrateFromChatId;
    }

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
     * @return Invoice|null
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     * @return void
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment()
    {
        return $this->successfulPayment;
    }

    /**
     * @param SuccessfulPayment $successfulPayment
     * @return void
     */
    public function setSuccessfulPayment($successfulPayment)
    {
        $this->successfulPayment = $successfulPayment;
    }

    /**
     * @return null|string
     */
    public function getConnectedWebsite()
    {
        return $this->connectedWebsite;
    }

    /**
     * @param string $connectedWebsite
     * @return void
     */
    public function setConnectedWebsite($connectedWebsite)
    {
        $this->connectedWebsite = $connectedWebsite;
    }

    /**
     * @return WebAppData|null
     */
    public function getWebAppData()
    {
        return $this->webAppData;
    }

    /**
     * @param WebAppData|null $webAppData
     * @return void
     */
    public function setWebAppData($webAppData)
    {
        $this->webAppData = $webAppData;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup()
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup $replyMarkup
     * @return void
     */
    public function setReplyMarkup($replyMarkup)
    {
        $this->replyMarkup = $replyMarkup;
    }

    /**
     * @return ForumTopicCreated|null
     */
    public function getForumTopicCreated()
    {
        return $this->forumTopicCreated;
    }

    /**
     * @param ForumTopicCreated $forumTopicCreated
     * @return void
     */
    public function setForumTopicCreated($forumTopicCreated)
    {
        $this->forumTopicCreated = $forumTopicCreated;
    }

    /**
     * @return ForumTopicClosed|null
     */
    public function getForumTopicClosed()
    {
        return $this->forumTopicClosed;
    }

    /**
     * @param ForumTopicClosed $forumTopicClosed
     * @return void
     */
    public function setForumTopicClosed($forumTopicClosed)
    {
        $this->forumTopicClosed = $forumTopicClosed;
    }

    /**
     * @return ForumTopicReopened|null
     */
    public function getForumTopicReopened()
    {
        return $this->forumTopicReopened;
    }

    /**
     * @param ForumTopicReopened $forumTopicReopened
     * @return void
     */
    public function setForumTopicReopened($forumTopicReopened)
    {
        $this->forumTopicReopened = $forumTopicReopened;
    }
}
