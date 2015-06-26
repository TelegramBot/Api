<?php
namespace tgbot\Api\Types;


class Message
{
    /**
     * Unique message identifier
     *
     * @var int
     */
    protected $messageId;

    /**
     * Sender
     *
     * @var \tgbot\Api\Types\User
     */
    protected $user;

    /**
     * Date the message was sent in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
     *
     * @var \tgbot\Api\Types\User|\tgbot\Api\Types\Group
     */
    protected $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var \tgbot\Api\Types\User
     */
    protected $forwardFrom;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     *
     * @var int
     */
    protected $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     *
     * @var \tgbot\Api\Types\Message
     */
    protected $replyToMessage;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var \tgbot\Api\Types\Audio
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var \tgbot\Api\Types\Document
     */
    protected $document;

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @var \tgbot\Api\Types\Photo
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var \tgbot\Api\Types\Sticker
     */
    protected $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var \tgbot\Api\Types\Video
     */
    protected $video;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var \tgbot\Api\Types\Contact
     */
    protected $contact;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var \tgbot\Api\Types\Location
     */
    protected $location;

    /**
     * Optional. A new member was added to the group, information about them (this member may be bot itself)
     *
     * @var \tgbot\Api\Types\User
     */
    protected $newChatParticipant;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var \tgbot\Api\Types\User
     */
    protected $leftChatParticipant;

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
}