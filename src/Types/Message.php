<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Payments\Invoice;
use TelegramBot\Api\Types\Payments\SuccessfulPayment;

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
        'from' => User::class,
        'date' => true,
        'chat' => Chat::class,
        'forward_from' => User::class,
        'forward_from_chat' => Chat::class,
        'forward_from_message_id' => true,
        'forward_date' => true,
        'forward_signature' => true,
        'forward_sender_name' => true,
        'reply_to_message' => Message::class,
        'via_bot' => User::class,
        'edit_date' => true,
        'media_group_id' => true,
        'author_signature' => true,
        'text' => true,
        'entities' => ArrayOfMessageEntity::class,
        'caption_entities' => ArrayOfMessageEntity::class,
        'audio' => Audio::class,
        'document' => Document::class,
        'animation' => Animation::class,
        'photo' => ArrayOfPhotoSize::class,
        'sticker' => Sticker::class,
        'video' => Video::class,
        'voice' => Voice::class,
        'caption' => true,
        'contact' => Contact::class,
        'location' => Location::class,
        'venue' => Venue::class,
        'poll' => Poll::class,
        'dice' => Dice::class,
        'new_chat_members' => ArrayOfUser::class,
        'left_chat_member' => User::class,
        'new_chat_title' => true,
        'new_chat_photo' => ArrayOfPhotoSize::class,
        'delete_chat_photo' => true,
        'group_chat_created' => true,
        'supergroup_chat_created' => true,
        'channel_chat_created' => true,
        'migrate_to_chat_id' => true,
        'migrate_from_chat_id' => true,
        'pinned_message' => Message::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
        'connected_website' => true,
        'forum_topic_created' => ForumTopicCreated::class,
        'forum_topic_closed' => ForumTopicClosed::class,
        'forum_topic_reopened' => ForumTopicReopened::class,
        'is_topic_message' => true,
        'message_thread_id' => true,
        'web_app_data' => WebAppData::class,
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    /**
     * Unique message identifier
     *
     * @var int|float
     */
    protected $messageId;

    /**
     * Optional. Sender name. Can be empty for messages sent to channels
     *
     * @var \TelegramBot\Api\Types\User|null
     */
    protected $from;

    /**
     * Date the message was sent in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
     *
     * @var \TelegramBot\Api\Types\Chat
     */
    protected $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var \TelegramBot\Api\Types\User|null
     */
    protected $forwardFrom;

    /**
     * Optional. For messages forwarded from channels, information about
     * the original channel
     *
     * @var \TelegramBot\Api\Types\Chat|null
     */
    protected $forwardFromChat;

    /**
     * Optional. For messages forwarded from channels, identifier of
     * the original message in the channel
     *
     * @var int|null
     */
    protected $forwardFromMessageId;

    /**
     * Optional. For messages forwarded from channels, signature of the post author if present
     *
     * @var string|null
     */
    protected $forwardSignature;

    /**
     * Optional. Sender's name for messages forwarded from users who disallow adding a link to their account
     * in forwarded messages
     *
     * @var string|null
     */
    protected $forwardSenderName;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     *
     * @var int|null
     */
    protected $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply.
     *
     * @var \TelegramBot\Api\Types\Message|null
     */
    protected $replyToMessage;

    /**
     * Optional. Bot through which the message was sent.
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
     * Optional. The unique identifier of a media message group
     * this message belongs to
     *
     * @var int|null
     */
    protected $mediaGroupId;

    /**
     * Optional. Signature of the post author for messages in channels
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
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
     * array of \TelegramBot\Api\Types\MessageEntity
     *
     * @var array|null
     */
    protected $entities;

    /**
     * Optional. For messages with a caption, special entities like usernames,
     * URLs, bot commands, etc. that appear in the caption
     *
     * @var ArrayOfMessageEntity|null
     */
    protected $captionEntities;

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
     * Optional. Message is a animation, information about the animation
     *
     * @var \TelegramBot\Api\Types\Animation|null
     */
    protected $animation;

    /**
     * Optional. Message is a photo, available sizes of the photo
     * array of \TelegramBot\Api\Types\Photo
     *
     * @var array|null
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var \TelegramBot\Api\Types\Sticker|null
     */
    protected $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var \TelegramBot\Api\Types\Video|null
     */
    protected $video;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var \TelegramBot\Api\Types\Voice|null
     */
    protected $voice;

    /**
     * Optional. Text description of the video (usually empty)
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var \TelegramBot\Api\Types\Contact|null
     */
    protected $contact;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var \TelegramBot\Api\Types\Location|null
     */
    protected $location;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var \TelegramBot\Api\Types\Venue|null
     */
    protected $venue;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var \TelegramBot\Api\Types\Poll|null
     */
    protected $poll;

    /**
     * Optional. Message is a dice with random value from 1 to 6
     *
     * @var \TelegramBot\Api\Types\Dice|null
     */
    protected $dice;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     * array of \TelegramBot\Api\Types\User
     *
     * @var \TelegramBot\Api\Types\User[]|null
     */
    protected $newChatMembers;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var \TelegramBot\Api\Types\User|null
     */
    protected $leftChatMember;

    /**
     * Optional. A group title was changed to this value
     *
     * @var string|null
     */
    protected $newChatTitle;

    /**
     * Optional. A group photo was change to this value
     *
     * @var PhotoSize[]|null
     */
    protected $newChatPhoto;

    /**
     * Optional. Informs that the group photo was deleted
     *
     * @var bool|null
     */
    protected $deleteChatPhoto;

    /**
     * Optional. Informs that the group has been created
     *
     * @var bool|null
     */
    protected $groupChatCreated;

    /**
     * Optional. Service message: the supergroup has been created
     *
     * @var bool|null
     */
    protected $supergroupChatCreated;

    /**
     * Optional. Service message: the channel has been created
     *
     * @var bool|null
     */
    protected $channelChatCreated;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier,
     * not exceeding 1e13 by absolute value
     *
     * @var int|null
     */
    protected $migrateToChatId;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier,
     * not exceeding 1e13 by absolute value
     *
     * @var int|null
     */
    protected $migrateFromChatId;

    /**
     * Optional. Specified message was pinned.Note that the Message object in this field
     * will not contain further reply_to_message fields even if it is itself a reply.
     *
     * @var Message|null
     */
    protected $pinnedMessage;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice.
     *
     * @var Invoice|null
     */
    protected $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment.
     *
     * @var SuccessfulPayment|null
     */
    protected $successfulPayment;

    /**
     * Optional. The domain name of the website on which the user has logged in.
     *
     * @var string|null
     */
    protected $connectedWebsite;

    /**
     * Optional. Service message: data sent by a Web App
     *
     * @var WebAppData|null
     */
    protected $webAppData;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     *
     * @var InlineKeyboardMarkup|null
     */
    protected $replyMarkup;

    /**
     * Optional. Service message: forum topic created
     *
     * @var ForumTopicCreated|null
     */
    protected $forumTopicCreated;

    /**
     * Optional. Service message: forum topic closed
     *
     * @var ForumTopicReopened|null
     */
    protected $forumTopicReopened;

    /**
     * Optional. Service message: forum topic reopened
     *
     * @var ForumTopicClosed|null
     */
    protected $forumTopicClosed;

    /**
     * Optional. True, if the message is sent to a forum topic
     *
     * @var bool|null
     */
    protected $isTopicMessage;

    /**
     * Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
     *
     * @var int|null
     */
    protected $messageThreadId;

    /**
     * @return int|float
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
     * @return User|null
     */
    public function getForwardFrom()
    {
        return $this->forwardFrom;
    }

    /**
     * @param User $forwardFrom
     * @return void
     */
    public function setForwardFrom(User $forwardFrom)
    {
        $this->forwardFrom = $forwardFrom;
    }

    /**
     * @return Chat|null
     */
    public function getForwardFromChat()
    {
        return $this->forwardFromChat;
    }

    /**
     * @param Chat $forwardFromChat
     * @return void
     */
    public function setForwardFromChat(Chat $forwardFromChat)
    {
        $this->forwardFromChat = $forwardFromChat;
    }

    /**
     * @return int|null
     */
    public function getForwardFromMessageId()
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @param int $forwardFromMessageId
     * @return void
     */
    public function setForwardFromMessageId($forwardFromMessageId)
    {
        $this->forwardFromMessageId = $forwardFromMessageId;
    }

    /**
     * @return null|string
     */
    public function getForwardSignature()
    {
        return $this->forwardSignature;
    }

    /**
     * @param string $forwardSignature
     * @return void
     */
    public function setForwardSignature($forwardSignature)
    {
        $this->forwardSignature = $forwardSignature;
    }

    /**
     * @return null|string
     */
    public function getForwardSenderName()
    {
        return $this->forwardSenderName;
    }

    /**
     * @param string $forwardSenderName
     * @return void
     */
    public function setForwardSenderName($forwardSenderName)
    {
        $this->forwardSenderName = $forwardSenderName;
    }

    /**
     * @return int|null
     */
    public function getForwardDate()
    {
        return $this->forwardDate;
    }

    /**
     * @param mixed $forwardDate
     * @return void
     * @throws InvalidArgumentException
     */
    public function setForwardDate($forwardDate)
    {
        if (is_int($forwardDate)) {
            $this->forwardDate = $forwardDate;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return null|self
     */
    public function getReplyToMessage()
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message $replyToMessage
     * @return void
     */
    public function setReplyToMessage(Message $replyToMessage)
    {
        $this->replyToMessage = $replyToMessage;
    }

    /**
     * @return User|null
     */
    public function getViaBot()
    {
        return $this->viaBot;
    }

    /**
     * @param User $viaBot
     * @return void
     */
    public function setViaBot(User $viaBot)
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
     * @return int|null
     */
    public function getMediaGroupId()
    {
        return $this->mediaGroupId;
    }

    /**
     * @param int $mediaGroupId
     * @return void
     */
    public function setMediaGroupId($mediaGroupId)
    {
        $this->mediaGroupId = $mediaGroupId;
    }

    /**
     * @return null|string
     */
    public function getAuthorSignature()
    {
        return $this->authorSignature;
    }

    /**
     * @param string $authorSignature
     * @return void
     */
    public function setAuthorSignature($authorSignature)
    {
        $this->authorSignature = $authorSignature;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return array|null
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param array $entities
     * @return void
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    /**
     * @return ArrayOfMessageEntity|null
     */
    public function getCaptionEntities()
    {
        return $this->captionEntities;
    }

    /**
     * @param ArrayOfMessageEntity $captionEntities
     * @return void
     */
    public function setCaptionEntities($captionEntities)
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return Audio|null
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param Audio $audio
     * @return void
     */
    public function setAudio(Audio $audio)
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
     * @param Document $document
     * @return void
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * @param Animation $animation
     * @return void
     */
    public function setAnimation(Animation $animation)
    {
        $this->animation = $animation;
    }

    /**
     * @return array|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param array $photo
     * @return void
     */
    public function setPhoto(array $photo)
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
     * @param Sticker $sticker
     * @return void
     */
    public function setSticker(Sticker $sticker)
    {
        $this->sticker = $sticker;
    }

    /**
     * @return Video|null
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param Video $video
     * @return void
     */
    public function setVideo(Video $video)
    {
        $this->video = $video;
    }

    /**
     * @return Voice|null
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * @param Voice $voice
     * @return void
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
     * @param string $caption
     * @return void
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return Contact|null
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return void
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return Venue|null
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param Venue $venue
     * @return void
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return Poll|null
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     * @return void
     */
    public function setPoll($poll)
    {
        $this->poll = $poll;
    }

    /**
     * @return Dice|null
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * @param Dice $dice
     * @return void
     */
    public function setDice(Dice $dice)
    {
        $this->dice = $dice;
    }

    /**
     * @return \TelegramBot\Api\Types\User[]|null
     */
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

    /**
     * @return PhotoSize[]|null
     */
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

    /**
     * @return null|self
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
     * @author MY
     *
     * @return Invoice|null
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @author MY
     * @param Invoice $invoice
     * @return void
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @author MY
     *
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment()
    {
        return $this->successfulPayment;
    }

    /**
     * @author MY
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

    /**
     * @return bool|null
     */
    public function getIsTopicMessage()
    {
        return $this->isTopicMessage;
    }

    /**
     * @param bool $isTopicMessage
     * @return void
     */
    public function setIsTopicMessage($isTopicMessage)
    {
        $this->isTopicMessage = $isTopicMessage;
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
}
