<?php
namespace tgbot\Api\Types;


class Message
{
    /**
     * @var int
     */
    protected $messageId;

    /**
     * @var \tgbot\Api\Types\User
     */
    protected $user;

    /**
     * @var int
     */
    protected $date;

    /**
     * @var \tgbot\Api\Types\User|\tgbot\Api\Types\Group
     */
    protected $chat;

    /**
     * @var \tgbot\Api\Types\User
     */
    protected $forwardFrom;

    /**
     * @var int
     */
    protected $forwardDate;

    /**
     * @var \tgbot\Api\Types\Message
     */
    protected $replyToMessage;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var \tgbot\Api\Types\Audio
     */
    protected $audio;

    /**
     * @var \tgbot\Api\Types\Document
     */
    protected $document;

    /**
     * @var \tgbot\Api\Types\Photo
     */
    protected $photo;

    /**
     * @var \tgbot\Api\Types\Sticker
     */
    protected $sticker;

    /**
     * @var \tgbot\Api\Types\Video
     */
    protected $video;

    /**
     * @var \tgbot\Api\Types\Contact
     */
    protected $contact;

    /**
     * @var \tgbot\Api\Types\Location
     */
    protected $location;

    /**
     * @var \tgbot\Api\Types\User
     */
    protected $newChatParticipant;

    /**
     * @var \tgbot\Api\Types\User
     */
    protected $leftChatParticipant;

    /**
     * @var string
     */
    protected $newChatTitle;

    /**
     * @var mixed
     */
    protected $new_chat_photo;

    /**
     * @var bool
     */
    protected $deleteChatPhoto;

    /**
     * @var bool
     */
    protected $groupChatCreated;
}