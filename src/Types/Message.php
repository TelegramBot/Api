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
    static protected $requiredParams = ['message_id', 'date', 'chat'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
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
    ];

    /**
     * Unique message identifier
     *
     * @var int
     */
    protected $messageId;

    /**
     * Optional. Sender name. Can be empty for messages sent to channels
     *
     * @var \TelegramBot\Api\Types\User
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
     * @var \TelegramBot\Api\Types\User
     */
    protected $forwardFrom;

    /**
     * Optional. For messages forwarded from channels, information about
     * the original channel
     *
     * @var \TelegramBot\Api\Types\Chat
     */
    protected $forwardFromChat;

    /**
     * Optional. For messages forwarded from channels, identifier of
     * the original message in the channel
     *
     * @var int
     */
    protected $forwardFromMessageId;

    /**
     * Optional. For messages forwarded from channels, signature of the post author if present
     *
     * @var string
     */
    protected $forwardSignature;

    /**
     * Optional. Sender's name for messages forwarded from users who disallow adding a link to their account
     * in forwarded messages
     *
     * @var string
     */
    protected $forwardSenderName;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     *
     * @var int
     */
    protected $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply.
     *
     * @var \TelegramBot\Api\Types\Message
     */
    protected $replyToMessage;

    /**
     * Optional. Bot through which the message was sent.
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $viaBot;

    /**
     * Optional. Date the message was last edited in Unix time
     *
     * @var int
     */
    protected $editDate;

    /**
     * Optional. The unique identifier of a media message group
     * this message belongs to
     *
     * @var int
     */
    protected $mediaGroupId;

    /**
     * Optional. Signature of the post author for messages in channels
     *
     * @var string
     */
    protected $authorSignature;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
     * array of \TelegramBot\Api\Types\MessageEntity
     *
     * @var array
     */
    protected $entities;

    /**
     * Optional. For messages with a caption, special entities like usernames,
     * URLs, bot commands, etc. that appear in the caption
     *
     * @var ArrayOfMessageEntity
     */
    protected $captionEntities;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var \TelegramBot\Api\Types\Audio
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var \TelegramBot\Api\Types\Document
     */
    protected $document;

    /**
     * Optional. Message is a animation, information about the animation
     *
     * @var \TelegramBot\Api\Types\Animation
     */
    protected $animation;

    /**
     * Optional. Message is a photo, available sizes of the photo
     * array of \TelegramBot\Api\Types\Photo
     *
     * @var array
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var \TelegramBot\Api\Types\Sticker
     */
    protected $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var \TelegramBot\Api\Types\Video
     */
    protected $video;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var \TelegramBot\Api\Types\Voice
     */
    protected $voice;

    /**
     * Optional. Text description of the video (usually empty)
     *
     * @var string
     */
    protected $caption;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var \TelegramBot\Api\Types\Contact
     */
    protected $contact;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var \TelegramBot\Api\Types\Location
     */
    protected $location;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var \TelegramBot\Api\Types\Venue
     */
    protected $venue;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var \TelegramBot\Api\Types\Poll
     */
    protected $poll;

    /**
     * Optional. Message is a dice with random value from 1 to 6
     *
     * @var \TelegramBot\Api\Types\Dice
     */
    protected $dice;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     * array of \TelegramBot\Api\Types\User
     *
     * @var array
     */
    protected $newChatMembers;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $leftChatMember;

    /**
     * Optional. A group title was changed to this value
     *
     * @var string
     */
    protected $newChatTitle;

    /**
     * Optional. A group photo was change to this value
     *
     * @var mixed
     */
    protected $newChatPhoto;

    /**
     * Optional. Informs that the group photo was deleted
     *
     * @var bool
     */
    protected $deleteChatPhoto;

    /**
     * Optional. Informs that the group has been created
     *
     * @var bool
     */
    protected $groupChatCreated;

    /**
     * Optional. Service message: the supergroup has been created
     *
     * @var bool
     */
    protected $supergroupChatCreated;

    /**
     * Optional. Service message: the channel has been created
     *
     * @var bool
     */
    protected $channelChatCreated;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier,
     * not exceeding 1e13 by absolute value
     *
     * @var int
     */
    protected $migrateToChatId;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier,
     * not exceeding 1e13 by absolute value
     *
     * @var int
     */
    protected $migrateFromChatId;

    /**
     * Optional. Specified message was pinned.Note that the Message object in this field
     * will not contain further reply_to_message fields even if it is itself a reply.
     *
     * @var Message
     */
    protected $pinnedMessage;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice.
     *
     * @var Invoice
     */
    protected $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment.
     *
     * @var SuccessfulPayment
     */
    protected $successfulPayment;

    /**
     * Optional. The domain name of the website on which the user has logged in.
     *
     * @var string
     */
    protected $connectedWebsite;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     *
     * @var InlineKeyboardMarkup
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
     * @param int $messageId
     *
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
     * @return User
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param User $from
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
     * @param int $date
     *
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
     * @return User
     */
    public function getForwardFrom()
    {
        return $this->forwardFrom;
    }

    /**
     * @param User $forwardFrom
     */
    public function setForwardFrom(User $forwardFrom)
    {
        $this->forwardFrom = $forwardFrom;
    }

    /**
     * @return Chat
     */
    public function getForwardFromChat()
    {
        return $this->forwardFromChat;
    }

    /**
     * @param Chat $forwardFromChat
     */
    public function setForwardFromChat(Chat $forwardFromChat)
    {
        $this->forwardFromChat = $forwardFromChat;
    }

    /**
     * @return int
     */
    public function getForwardFromMessageId()
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @param int $forwardFromMessageId
     */
    public function setForwardFromMessageId($forwardFromMessageId)
    {
        $this->forwardFromMessageId = $forwardFromMessageId;
    }

    /**
     * @return string
     */
    public function getForwardSignature()
    {
        return $this->forwardSignature;
    }

    /**
     * @param string $forwardSignature
     */
    public function setForwardSignature($forwardSignature)
    {
        $this->forwardSignature = $forwardSignature;
    }

    /**
     * @return string
     */
    public function getForwardSenderName()
    {
        return $this->forwardSenderName;
    }

    /**
     * @param string $forwardSenderName
     */
    public function setForwardSenderName($forwardSenderName)
    {
        $this->forwardSenderName = $forwardSenderName;
    }

    /**
     * @return int
     */
    public function getForwardDate()
    {
        return $this->forwardDate;
    }

    /**
     * @param int $forwardDate
     *
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
     * @return Message
     */
    public function getReplyToMessage()
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message $replyToMessage
     */
    public function setReplyToMessage(Message $replyToMessage)
    {
        $this->replyToMessage = $replyToMessage;
    }

    /**
     * @return User
     */
    public function getViaBot()
    {
        return $this->viaBot;
    }

    /**
     * @param User $viaBot
     */
    public function setViaBot(User $viaBot)
    {
        $this->viaBot = $viaBot;
    }

    /**
     * @return int
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * @param int $editDate
     *
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
     * @return int
     */
    public function getMediaGroupId()
    {
        return $this->mediaGroupId;
    }

    /**
     * @param int $mediaGroupId
     */
    public function setMediaGroupId($mediaGroupId)
    {
        $this->mediaGroupId = $mediaGroupId;
    }

    /**
     * @return string
     */
    public function getAuthorSignature()
    {
        return $this->authorSignature;
    }

    /**
     * @param string $authorSignature
     */
    public function setAuthorSignature($authorSignature)
    {
        $this->authorSignature = $authorSignature;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return array
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param array $entities
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    /**
     * @return ArrayOfMessageEntity
     */
    public function getCaptionEntities()
    {
        return $this->captionEntities;
    }

    /**
     * @param ArrayOfMessageEntity $captionEntities
     */
    public function setCaptionEntities($captionEntities)
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return Audio
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param Audio $audio
     */
    public function setAudio(Audio $audio)
    {
        $this->audio = $audio;
    }

    /**
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param Document $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return Animation
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * @param Animation $animation
     */
    public function setAnimation(Animation $animation)
    {
        $this->animation = $animation;
    }

    /**
     * @return array
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param array $photo
     */
    public function setPhoto(array $photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return Sticker
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param Sticker $sticker
     */
    public function setSticker(Sticker $sticker)
    {
        $this->sticker = $sticker;
    }

    /**
     * @return Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param Video $video
     */
    public function setVideo(Video $video)
    {
        $this->video = $video;
    }

    /**
     * @return Voice
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * @param Voice $voice
     */
    public function setVoice($voice)
    {
        $this->voice = $voice;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return Venue
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param Venue $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return Poll
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     */
    public function setPoll($poll)
    {
        $this->poll = $poll;
    }

    /**
     * @return Dice
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * @param Dice $dice
     */
    public function setDice(Dice $dice)
    {
        $this->dice = $dice;
    }

    /**
     * @return array
     */
    public function getNewChatMembers()
    {
        return $this->newChatMembers;
    }

    /**
     * @param array $newChatMembers
     */
    public function setNewChatMembers($newChatMembers)
    {
        $this->newChatMembers = $newChatMembers;
    }

    /**
     * @return User
     */
    public function getLeftChatMember()
    {
        return $this->leftChatMember;
    }

    /**
     * @param User $leftChatMember
     */
    public function setLeftChatMember($leftChatMember)
    {
        $this->leftChatMember = $leftChatMember;
    }

    /**
     * @return string
     */
    public function getNewChatTitle()
    {
        return $this->newChatTitle;
    }

    /**
     * @param string $newChatTitle
     */
    public function setNewChatTitle($newChatTitle)
    {
        $this->newChatTitle = $newChatTitle;
    }

    /**
     * @return array
     */
    public function getNewChatPhoto()
    {
        return $this->newChatPhoto;
    }

    /**
     * @param array $newChatPhoto
     */
    public function setNewChatPhoto($newChatPhoto)
    {
        $this->newChatPhoto = $newChatPhoto;
    }

    /**
     * @return boolean
     */
    public function isDeleteChatPhoto()
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param boolean $deleteChatPhoto
     */
    public function setDeleteChatPhoto($deleteChatPhoto)
    {
        $this->deleteChatPhoto = (bool)$deleteChatPhoto;
    }

    /**
     * @return boolean
     */
    public function isGroupChatCreated()
    {
        return $this->groupChatCreated;
    }

    /**
     * @param boolean $groupChatCreated
     */
    public function setGroupChatCreated($groupChatCreated)
    {
        $this->groupChatCreated = (bool)$groupChatCreated;
    }

    /**
     * @return boolean
     */
    public function isSupergroupChatCreated()
    {
        return $this->supergroupChatCreated;
    }

    /**
     * @param boolean $supergroupChatCreated
     */
    public function setSupergroupChatCreated($supergroupChatCreated)
    {
        $this->supergroupChatCreated = $supergroupChatCreated;
    }

    /**
     * @return boolean
     */
    public function isChannelChatCreated()
    {
        return $this->channelChatCreated;
    }

    /**
     * @param boolean $channelChatCreated
     */
    public function setChannelChatCreated($channelChatCreated)
    {
        $this->channelChatCreated = $channelChatCreated;
    }

    /**
     * @return int
     */
    public function getMigrateToChatId()
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int $migrateToChatId
     */
    public function setMigrateToChatId($migrateToChatId)
    {
        $this->migrateToChatId = $migrateToChatId;
    }

    /**
     * @return int
     */
    public function getMigrateFromChatId()
    {
        return $this->migrateFromChatId;
    }

    /**
     * @param int $migrateFromChatId
     */
    public function setMigrateFromChatId($migrateFromChatId)
    {
        $this->migrateFromChatId = $migrateFromChatId;
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
     * @author MY
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @author MY
     * @param Invoice $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @author MY
     * @return SuccessfulPayment
     */
    public function getSuccessfulPayment()
    {
        return $this->successfulPayment;
    }

    /**
     * @author MY
     * @param SuccessfulPayment $successfulPayment
     */
    public function setSuccessfulPayment($successfulPayment)
    {
        $this->successfulPayment = $successfulPayment;
    }

    /**
     * @return string
     */
    public function getConnectedWebsite()
    {
        return $this->connectedWebsite;
    }

    /**
     * @param string $connectedWebsite
     */
    public function setConnectedWebsite($connectedWebsite)
    {
        $this->connectedWebsite = $connectedWebsite;
    }

    /**
     * @return InlineKeyboardMarkup
     */
    public function getReplyMarkup()
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup $replyMarkup
     */
    public function setReplyMarkup($replyMarkup)
    {
        $this->replyMarkup = $replyMarkup;
    }
}
