<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\QueryResult\Photo;
use TelegramBot\Api\Types\Payments\Invoice;
use TelegramBot\Api\Types\Payments\SuccessfulPayment;

class Message extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['message_id', 'date', 'chat'];

    /**
     * @var array
     */
    protected static array $map = [
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
    protected int $messageId;

    /**
     * Optional. Sender name. Can be empty for messages sent to channels
     *
     * @var User
     */
    protected User $from;

    /**
     * Date the message was sent in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var User
     */
    protected User $forwardFrom;

    /**
     * Optional. For messages forwarded from channels, information about
     * the original channel
     *
     * @var Chat
     */
    protected Chat $forwardFromChat;

    /**
     * Optional. For messages forwarded from channels, identifier of
     * the original message in the channel
     *
     * @var int
     */
    protected int $forwardFromMessageId;

    /**
     * Optional. For messages forwarded from channels, signature of the post author if present
     *
     * @var string
     */
    protected string $forwardSignature;

    /**
     * Optional. Sender's name for messages forwarded from users who disallow adding a link to their account
     * in forwarded messages
     *
     * @var string
     */
    protected string $forwardSenderName;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     *
     * @var int
     */
    protected int $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply.
     *
     * @var Message
     */
    protected Message $replyToMessage;

    /**
     * Optional. Date the message was last edited in Unix time
     *
     * @var int
     */
    protected int $editDate;

    /**
     * Optional. The unique identifier of a media message group
     * this message belongs to
     *
     * @var int
     */
    protected int $mediaGroupId;

    /**
     * Optional. Signature of the post author for messages in channels
     *
     * @var string
     */
    protected string $authorSignature;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string
     */
    protected string $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
     * array of \TelegramBot\Api\Types\MessageEntity
     *
     * @var MessageEntity[]
     */
    protected array $entities;

    /**
     * Optional. For messages with a caption, special entities like usernames,
     * URLs, bot commands, etc. that appear in the caption
     *
     * @var ArrayOfMessageEntity
     */
    protected ArrayOfMessageEntity $captionEntities;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var Audio
     */
    protected Audio $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var Document
     */
    protected Document $document;

    /**
     * Optional. Message is a animation, information about the animation
     *
     * @var Animation
     */
    protected Animation $animation;

    /**
     * Optional. Message is a photo, available sizes of the photo
     * array of \TelegramBot\Api\Types\Photo
     *
     * @var Photo[]
     */
    protected array $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var Sticker
     */
    protected Sticker $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var Video
     */
    protected Video $video;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var Voice
     */
    protected Voice $voice;

    /**
     * Optional. Text description of the video (usually empty)
     *
     * @var string
     */
    protected string $caption;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var Contact
     */
    protected Contact $contact;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var Location
     */
    protected Location $location;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var Venue
     */
    protected Venue $venue;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var Poll
     */
    protected Poll $poll;

    /**
     * Optional. Message is a dice with random value from 1 to 6
     *
     * @var Dice
     */
    protected Dice $dice;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     * array of \TelegramBot\Api\Types\User
     *
     * @var User[]
     */
    protected array $newChatMembers;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var User
     */
    protected User $leftChatMember;

    /**
     * Optional. A group title was changed to this value
     *
     * @var string
     */
    protected string $newChatTitle;

    /**
     * Optional. A chat photo was change to this value
     *
     * @var PhotoSize[]
     */
    protected array $newChatPhoto;

    /**
     * Optional. Informs that the group photo was deleted
     *
     * @var bool
     */
    protected bool $deleteChatPhoto;

    /**
     * Optional. Informs that the group has been created
     *
     * @var bool
     */
    protected bool $groupChatCreated;

    /**
     * Optional. Service message: the supergroup has been created
     *
     * @var bool
     */
    protected bool $supergroupChatCreated;

    /**
     * Optional. Service message: the channel has been created
     *
     * @var bool
     */
    protected bool $channelChatCreated;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier, not exceeding 1e13 by
     * absolute value
     *
     * @var int
     */
    protected int $migrateToChatId;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier,
     * not exceeding 1e13 by absolute value
     *
     * @var int
     */
    protected int $migrateFromChatId;

    /**
     * Optional. Specified message was pinned.Note that the Message object in this field
     * will not contain further reply_to_message fields even if it is itself a reply.
     *
     * @var Message
     */
    protected Message $pinnedMessage;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice.
     *
     * @var Invoice
     */
    protected Invoice $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment.
     *
     * @var SuccessfulPayment
     */
    protected SuccessfulPayment $successfulPayment;

    /**
     * Optional. The domain name of the website on which the user has logged in.
     *
     * @var string
     */
    protected string $connectedWebsite;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     *
     * @var InlineKeyboardMarkup
     */
    protected InlineKeyboardMarkup $replyMarkup;

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return User
     */
    public function getForwardFrom(): User
    {
        return $this->forwardFrom;
    }

    /**
     * @param User $forwardFrom
     */
    public function setForwardFrom(User $forwardFrom): void
    {
        $this->forwardFrom = $forwardFrom;
    }

    /**
     * @return Chat
     */
    public function getForwardFromChat(): Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * @param Chat $forwardFromChat
     */
    public function setForwardFromChat(Chat $forwardFromChat): void
    {
        $this->forwardFromChat = $forwardFromChat;
    }

    /**
     * @return int
     */
    public function getForwardFromMessageId(): int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @param int $forwardFromMessageId
     */
    public function setForwardFromMessageId(int $forwardFromMessageId): void
    {
        $this->forwardFromMessageId = $forwardFromMessageId;
    }

    /**
     * @return string
     */
    public function getForwardSignature(): string
    {
        return $this->forwardSignature;
    }

    /**
     * @param string $forwardSignature
     */
    public function setForwardSignature(string $forwardSignature): void
    {
        $this->forwardSignature = $forwardSignature;
    }

    /**
     * @return string
     */
    public function getForwardSenderName(): string
    {
        return $this->forwardSenderName;
    }

    /**
     * @param string $forwardSenderName
     */
    public function setForwardSenderName(string $forwardSenderName): void
    {
        $this->forwardSenderName = $forwardSenderName;
    }

    /**
     * @return int
     */
    public function getForwardDate(): int
    {
        return $this->forwardDate;
    }

    /**
     * @param int $forwardDate
     */
    public function setForwardDate(int $forwardDate): void
    {
        $this->forwardDate = $forwardDate;
    }

    /**
     * @return Message
     */
    public function getReplyToMessage(): Message
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message $replyToMessage
     */
    public function setReplyToMessage(Message $replyToMessage): void
    {
        $this->replyToMessage = $replyToMessage;
    }

    /**
     * @return int
     */
    public function getEditDate(): int
    {
        return $this->editDate;
    }

    /**
     * @param int $editDate
     */
    public function setEditDate(int $editDate): void
    {
        $this->editDate = $editDate;
    }

    /**
     * @return int
     */
    public function getMediaGroupId(): int
    {
        return $this->mediaGroupId;
    }

    /**
     * @param int $mediaGroupId
     */
    public function setMediaGroupId(int $mediaGroupId): void
    {
        $this->mediaGroupId = $mediaGroupId;
    }

    /**
     * @return string
     */
    public function getAuthorSignature(): string
    {
        return $this->authorSignature;
    }

    /**
     * @param string $authorSignature
     */
    public function setAuthorSignature(string $authorSignature): void
    {
        $this->authorSignature = $authorSignature;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[] $entities
     */
    public function setEntities(array $entities): void
    {
        $this->entities = $entities;
    }

    /**
     * @return ArrayOfMessageEntity
     */
    public function getCaptionEntities(): ArrayOfMessageEntity
    {
        return $this->captionEntities;
    }

    /**
     * @param ArrayOfMessageEntity $captionEntities
     */
    public function setCaptionEntities(ArrayOfMessageEntity $captionEntities): void
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return Audio
     */
    public function getAudio(): Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio $audio
     */
    public function setAudio(Audio $audio): void
    {
        $this->audio = $audio;
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @param Document $document
     */
    public function setDocument(Document $document): void
    {
        $this->document = $document;
    }

    /**
     * @return Animation
     */
    public function getAnimation(): Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation $animation
     */
    public function setAnimation(Animation $animation): void
    {
        $this->animation = $animation;
    }

    /**
     * @return Photo[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param Photo[] $photo
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return Sticker
     */
    public function getSticker(): Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker $sticker
     */
    public function setSticker(Sticker $sticker): void
    {
        $this->sticker = $sticker;
    }

    /**
     * @return Video
     */
    public function getVideo(): Video
    {
        return $this->video;
    }

    /**
     * @param Video $video
     */
    public function setVideo(Video $video): void
    {
        $this->video = $video;
    }

    /**
     * @return Voice
     */
    public function getVoice(): Voice
    {
        return $this->voice;
    }

    /**
     * @param Voice $voice
     */
    public function setVoice(Voice $voice): void
    {
        $this->voice = $voice;
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return Venue
     */
    public function getVenue(): Venue
    {
        return $this->venue;
    }

    /**
     * @param Venue $venue
     */
    public function setVenue(Venue $venue): void
    {
        $this->venue = $venue;
    }

    /**
     * @return Poll
     */
    public function getPoll(): Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     */
    public function setPoll(Poll $poll): void
    {
        $this->poll = $poll;
    }

    /**
     * @return Dice
     */
    public function getDice(): Dice
    {
        return $this->dice;
    }

    /**
     * @param Dice $dice
     */
    public function setDice(Dice $dice): void
    {
        $this->dice = $dice;
    }

    /**
     * @return User[]
     */
    public function getNewChatMembers(): array
    {
        return $this->newChatMembers;
    }

    /**
     * @param User[] $newChatMembers
     */
    public function setNewChatMembers(array $newChatMembers): void
    {
        $this->newChatMembers = $newChatMembers;
    }

    /**
     * @return User
     */
    public function getLeftChatMember(): User
    {
        return $this->leftChatMember;
    }

    /**
     * @param User $leftChatMember
     */
    public function setLeftChatMember(User $leftChatMember): void
    {
        $this->leftChatMember = $leftChatMember;
    }

    /**
     * @return string
     */
    public function getNewChatTitle(): string
    {
        return $this->newChatTitle;
    }

    /**
     * @param string $newChatTitle
     */
    public function setNewChatTitle(string $newChatTitle): void
    {
        $this->newChatTitle = $newChatTitle;
    }

    /**
     * @return PhotoSize[]
     */
    public function getNewChatPhoto(): array
    {
        return $this->newChatPhoto;
    }

    /**
     * @param PhotoSize[] $newChatPhoto
     */
    public function setNewChatPhoto(array $newChatPhoto): void
    {
        $this->newChatPhoto = $newChatPhoto;
    }

    /**
     * @return bool
     */
    public function isDeleteChatPhoto(): bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param bool $deleteChatPhoto
     */
    public function setDeleteChatPhoto(bool $deleteChatPhoto): void
    {
        $this->deleteChatPhoto = $deleteChatPhoto;
    }

    /**
     * @return bool
     */
    public function isGroupChatCreated(): bool
    {
        return $this->groupChatCreated;
    }

    /**
     * @param bool $groupChatCreated
     */
    public function setGroupChatCreated(bool $groupChatCreated): void
    {
        $this->groupChatCreated = $groupChatCreated;
    }

    /**
     * @return bool
     */
    public function isSupergroupChatCreated(): bool
    {
        return $this->supergroupChatCreated;
    }

    /**
     * @param bool $supergroupChatCreated
     */
    public function setSupergroupChatCreated(bool $supergroupChatCreated): void
    {
        $this->supergroupChatCreated = $supergroupChatCreated;
    }

    /**
     * @return bool
     */
    public function isChannelChatCreated(): bool
    {
        return $this->channelChatCreated;
    }

    /**
     * @param bool $channelChatCreated
     */
    public function setChannelChatCreated(bool $channelChatCreated): void
    {
        $this->channelChatCreated = $channelChatCreated;
    }

    /**
     * @return int
     */
    public function getMigrateToChatId(): int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int $migrateToChatId
     */
    public function setMigrateToChatId(int $migrateToChatId): void
    {
        $this->migrateToChatId = $migrateToChatId;
    }

    /**
     * @return int
     */
    public function getMigrateFromChatId(): int
    {
        return $this->migrateFromChatId;
    }

    /**
     * @param int $migrateFromChatId
     */
    public function setMigrateFromChatId(int $migrateFromChatId): void
    {
        $this->migrateFromChatId = $migrateFromChatId;
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
     * @return Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice(Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return SuccessfulPayment
     */
    public function getSuccessfulPayment(): SuccessfulPayment
    {
        return $this->successfulPayment;
    }

    /**
     * @param SuccessfulPayment $successfulPayment
     */
    public function setSuccessfulPayment(SuccessfulPayment $successfulPayment): void
    {
        $this->successfulPayment = $successfulPayment;
    }

    /**
     * @return string
     */
    public function getConnectedWebsite(): string
    {
        return $this->connectedWebsite;
    }

    /**
     * @param string $connectedWebsite
     */
    public function setConnectedWebsite(string $connectedWebsite): void
    {
        $this->connectedWebsite = $connectedWebsite;
    }

    /**
     * @return InlineKeyboardMarkup
     */
    public function getReplyMarkup(): InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup $replyMarkup
     */
    public function setReplyMarkup(InlineKeyboardMarkup $replyMarkup): void
    {
        $this->replyMarkup = $replyMarkup;
    }
}
