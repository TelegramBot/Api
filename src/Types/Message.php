<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\QueryResult\Photo;
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
        'forward_signature' => true,
        'forward_sender_name' => true,
        'forward_date' => true,
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
//        'game' => Game::class,
        'photo' => ArrayOfPhotoSize::class,
        'sticker' => Sticker::class,
        'video' => Video::class,
        'voice' => Voice::class,
//        'video_note' => VideoNote::class,
        'caption' => true,
        'contact' => Contact::class,
        'location' => Location::class,
        'venue' => Venue::class,
        'poll' => Poll::class,
//        'new_chat_members' => ArrayOfUsers::class,
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
        'passport_data' => PassportData::class,
//        'reply_markup' => InlineKeyboardMarkup::class,
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
     * @var User
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
     * @var Chat
     */
    protected $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var User|null
     */
    protected $forwardFrom;

    /**
     * Optional. For messages forwarded from channels, information about
     * the original channel
     *
     * @var Chat|null
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
     * Optional. Sender's name for messages forwarded from users who disallow adding a link
     * to their account in forwarded messages
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
     * Optional. For replies, the original message. Note that the Message object in this field
     * will not contain further reply_to_message fields even if it itself is a reply.
     *
     * @var Message|null
     */
    protected $replyToMessage;

    /**
     * Optional. Date the message was last edited in Unix time
     *
     * @var int|null
     */
    protected $editDate;

    /**
     * Optional. The unique identifier of a media message group this message belongs to
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
     * @var MessageEntity[]|null
     */
    protected $entities;

    /**
     * Optional. For messages with a caption, special entities like usernames,
     * URLs, bot commands, etc. that appear in the caption
     *
     * @var MessageEntity[]|null
     */
    protected $captionEntities;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var Audio|null
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var Document|null
     */
    protected $document;

    /**
     * Optional. Message is a animation, information about the animation
     *
     * @var Animation|null
     */
    protected $animation;

    /**
     * Optional. Message is a game, information about the game
     *
     * @var Game|null
     */
    protected $game;

    /**
     * Optional. Message is a photo, available sizes of the photo
     * array of \TelegramBot\Api\Types\PhotoSize
     *
     * @var PhotoSize[]|null
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var Sticker|null
     */
    protected $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var Video|null
     */
    protected $video;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var Voice|null
     */
    protected $voice;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var VideoNote|null
     */
    protected $videoNote;

    /**
     * Optional. Text description of the video (usually empty)
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var Contact|null
     */
    protected $contact;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var Location|null
     */
    protected $location;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var Venue|null
     */
    protected $venue;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var Poll|null
     */
    protected $poll;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     *
     * @var User[]|null
     */
    protected $newChatMembers;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var User|null
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
     * Optional. Service message: the supergroup has been created.
     * This field can‘t be received in a message coming through updates,
     * because bot can’t be a member of a supergroup when it is created.
     * It can only be found in reply_to_message if someone replies
     * to a very first message in a directly created supergroup.
     *
     * @var bool|null
     */
    protected $supergroupChatCreated;

    /**
     * Optional. Service message: the channel has been created.
     * This field can‘t be received in a message coming through updates,
     * because bot can’t be a member of a channel when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a channel.
     *
     * @var bool|null
     */
    protected $channelChatCreated;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so
     * a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    protected $migrateToChatId;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so
     * a signed 64 bit integer or double-precision float type are safe for storing this identifier.
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
     * Optional. Telegram Passport data
     *
     * @var PassportData|null
     */
    protected $passportData;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     *
     * @var InlineKeyboardMarkup|null
     */
    protected $replyMarkup;

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return Message
     */
    public function setMessageId(int $messageId): Message
    {
        $this->messageId = $messageId;

        return $this;
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
     * @return Message
     */
    public function setFrom(User $from): Message
    {
        $this->from = $from;

        return $this;
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
     * @return Message
     */
    public function setDate(int $date): Message
    {
        $this->date = $date;

        return $this;
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
     * @return Message
     */
    public function setChat(Chat $chat): Message
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getForwardFrom(): ?User
    {
        return $this->forwardFrom;
    }

    /**
     * @param User $forwardFrom
     * @return Message
     */
    public function setForwardFrom(User $forwardFrom): Message
    {
        $this->forwardFrom = $forwardFrom;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * @param Chat $forwardFromChat
     * @return Message
     */
    public function setForwardFromChat(Chat $forwardFromChat): Message
    {
        $this->forwardFromChat = $forwardFromChat;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @param int $forwardFromMessageId
     * @return Message
     */
    public function setForwardFromMessageId(int $forwardFromMessageId): Message
    {
        $this->forwardFromMessageId = $forwardFromMessageId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardSignature(): ?string
    {
        return $this->forwardSignature;
    }

    /**
     * @param string $forwardSignature
     * @return Message
     */
    public function setForwardSignature(string $forwardSignature): Message
    {
        $this->forwardSignature = $forwardSignature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardSenderName(): ?string
    {
        return $this->forwardSenderName;
    }

    /**
     * @param string $forwardSenderName
     * @return Message
     */
    public function setForwardSenderName(string $forwardSenderName): Message
    {
        $this->forwardSenderName = $forwardSenderName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardDate(): ?int
    {
        return $this->forwardDate;
    }

    /**
     * @param int $forwardDate
     * @return Message
     */
    public function setForwardDate(int $forwardDate): Message
    {
        $this->forwardDate = $forwardDate;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message $replyToMessage
     * @return Message
     */
    public function setReplyToMessage(Message $replyToMessage): Message
    {
        $this->replyToMessage = $replyToMessage;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->editDate;
    }

    /**
     * @param int $editDate
     * @return Message
     */
    public function setEditDate(int $editDate): Message
    {
        $this->editDate = $editDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMediaGroupId(): ?int
    {
        return $this->mediaGroupId;
    }

    /**
     * @param int $mediaGroupId
     * @return Message
     */
    public function setMediaGroupId(int $mediaGroupId): Message
    {
        $this->mediaGroupId = $mediaGroupId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->authorSignature;
    }

    /**
     * @param string $authorSignature
     * @return Message
     */
    public function setAuthorSignature(string $authorSignature): Message
    {
        $this->authorSignature = $authorSignature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Message
     */
    public function setText(string $text): Message
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     * @return Message
     */
    public function setEntities(array $entities): Message
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param MessageEntity[] $captionEntities
     * @return Message
     */
    public function setCaptionEntities(array $captionEntities): Message
    {
        $this->captionEntities = $captionEntities;

        return $this;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio $audio
     * @return Message
     */
    public function setAudio(Audio $audio): Message
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Document $document
     * @return Message
     */
    public function setDocument(Document $document): Message
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation $animation
     * @return Message
     */
    public function setAnimation(Animation $animation): Message
    {
        $this->animation = $animation;
        return $this;
    }

    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game $game
     * @return Message
     */
    public function setGame(Game $game): Message
    {
        $this->game = $game;
        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[] $photo
     * @return Message
     */
    public function setPhoto(array $photo): Message
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker $sticker
     * @return Message
     */
    public function setSticker(Sticker $sticker): Message
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video $video
     * @return Message
     */
    public function setVideo(Video $video): Message
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param Voice $voice
     * @return Message
     */
    public function setVoice(Voice $voice): Message
    {
        $this->voice = $voice;
        return $this;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->videoNote;
    }

    /**
     * @param VideoNote $videoNote
     * @return Message
     */
    public function setVideoNote(VideoNote $videoNote): Message
    {
        $this->videoNote = $videoNote;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     * @return Message
     */
    public function setCaption(string $caption): Message
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Message
     */
    public function setContact(Contact $contact): Message
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return Message
     */
    public function setLocation(Location $location): Message
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @param Venue $venue
     * @return Message
     */
    public function setVenue(Venue $venue): Message
    {
        $this->venue = $venue;
        return $this;
    }

    /**
     * @return Poll|null
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     * @return Message
     */
    public function setPoll(Poll $poll): Message
    {
        $this->poll = $poll;
        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getNewChatMembers(): ?array
    {
        return $this->newChatMembers;
    }

    /**
     * @param User[] $newChatMembers
     * @return Message
     */
    public function setNewChatMembers(array $newChatMembers): Message
    {
        $this->newChatMembers = $newChatMembers;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember(): ?User
    {
        return $this->leftChatMember;
    }

    /**
     * @param User $leftChatMember
     * @return Message
     */
    public function setLeftChatMember(User $leftChatMember): Message
    {
        $this->leftChatMember = $leftChatMember;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->newChatTitle;
    }

    /**
     * @param string $newChatTitle
     * @return Message
     */
    public function setNewChatTitle(string $newChatTitle): Message
    {
        $this->newChatTitle = $newChatTitle;
        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->newChatPhoto;
    }

    /**
     * @param PhotoSize[] $newChatPhoto
     * @return Message
     */
    public function setNewChatPhoto(array $newChatPhoto): Message
    {
        $this->newChatPhoto = $newChatPhoto;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleteChatPhoto(): ?bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param bool $deleteChatPhoto
     * @return Message
     */
    public function setDeleteChatPhoto(bool $deleteChatPhoto): Message
    {
        $this->deleteChatPhoto = $deleteChatPhoto;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGroupChatCreated(): ?bool
    {
        return $this->groupChatCreated;
    }

    /**
     * @param bool $groupChatCreated
     * @return Message
     */
    public function setGroupChatCreated(bool $groupChatCreated): Message
    {
        $this->groupChatCreated = $groupChatCreated;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSupergroupChatCreated(): ?bool
    {
        return $this->supergroupChatCreated;
    }

    /**
     * @param bool $supergroupChatCreated
     * @return Message
     */
    public function setSupergroupChatCreated(bool $supergroupChatCreated): Message
    {
        $this->supergroupChatCreated = $supergroupChatCreated;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChannelChatCreated(): ?bool
    {
        return $this->channelChatCreated;
    }

    /**
     * @param bool $channelChatCreated
     * @return Message
     */
    public function setChannelChatCreated(bool $channelChatCreated): Message
    {
        $this->channelChatCreated = $channelChatCreated;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int $migrateToChatId
     * @return Message
     */
    public function setMigrateToChatId(int $migrateToChatId): Message
    {
        $this->migrateToChatId = $migrateToChatId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrateFromChatId;
    }

    /**
     * @param int $migrateFromChatId
     * @return Message
     */
    public function setMigrateFromChatId(int $migrateFromChatId): Message
    {
        $this->migrateFromChatId = $migrateFromChatId;
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
     * @return Message
     */
    public function setPinnedMessage(Message $pinnedMessage): Message
    {
        $this->pinnedMessage = $pinnedMessage;
        return $this;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     * @return Message
     */
    public function setInvoice(Invoice $invoice): Message
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successfulPayment;
    }

    /**
     * @param SuccessfulPayment $successfulPayment
     * @return Message
     */
    public function setSuccessfulPayment(SuccessfulPayment $successfulPayment): Message
    {
        $this->successfulPayment = $successfulPayment;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connectedWebsite;
    }

    /**
     * @param string $connectedWebsite
     * @return Message
     */
    public function setConnectedWebsite(string $connectedWebsite): Message
    {
        $this->connectedWebsite = $connectedWebsite;
        return $this;
    }

    /**
     * @return PassportData
     */
    public function getPassportData(): ?PassportData
    {
        return $this->passportData;
    }

    /**
     * @param PassportData $passportData
     * @return Message
     */
    public function setPassportData(PassportData $passportData): Message
    {
        $this->passportData = $passportData;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup $replyMarkup
     * @return Message
     */
    public function setReplyMarkup(InlineKeyboardMarkup $replyMarkup): Message
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }
}
