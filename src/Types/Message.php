<?php
namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

class Message extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = array('message_id', 'from', 'date', 'chat');

    /**
     * Unique message identifier
     *
     * @var int
     */
    protected $messageId;

    /**
     * Sender
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
     * @var \TelegramBot\Api\Types\User|\TelegramBot\Api\Types\GroupChat
     */
    protected $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $forwardFrom;

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
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string
     */
    protected $text;

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
     * Optional. A new member was added to the group, information about them (this member may be bot itself)
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $newChatParticipant;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var \TelegramBot\Api\Types\User
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
     * @return GroupChat|User
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param GroupChat|User $chat
     */
    public function setChat(TypeInterface $chat)
    {
        $this->chat = $chat;
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
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date)
    {
        if (is_integer($date)) {
            $this->date = $date;
        } else {
            throw new InvalidArgumentException();
        }
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
        $this->deleteChatPhoto = (bool) $deleteChatPhoto;
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
     * @return int
     */
    public function getForwardDate()
    {
        return $this->forwardDate;
    }

    /**
     * @param int $forwardDate
     */
    public function setForwardDate($forwardDate)
    {
        if (is_integer($forwardDate)) {
            $this->forwardDate = $forwardDate;
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
        $this->groupChatCreated = (bool) $groupChatCreated;
    }

    /**
     * @return User
     */
    public function getLeftChatParticipant()
    {
        return $this->leftChatParticipant;
    }

    /**
     * @param User $leftChatParticipant
     */
    public function setLeftChatParticipant($leftChatParticipant)
    {
        $this->leftChatParticipant = $leftChatParticipant;
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
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     */
    public function setMessageId($messageId)
    {
        if (is_integer($messageId)) {
            $this->messageId = $messageId;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return User
     */
    public function getNewChatParticipant()
    {
        return $this->newChatParticipant;
    }

    /**
     * @param User $newChatParticipant
     */
    public function setNewChatParticipant($newChatParticipant)
    {
        $this->newChatParticipant = $newChatParticipant;
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
     * @return Message
     */
    public function getReplyToMessage()
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message $replyToMessage
     */
    public function setReplyToMessage($replyToMessage)
    {
        $this->replyToMessage = $replyToMessage;
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

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new self();

        $instance->setMessageId($data['message_id']);
        $instance->setDate($data['date']);
        $instance->setFrom(User::fromResponse($data['from']));

        if (isset($data['chat'], $data['chat']['title'])) {
            $instance->setChat(GroupChat::fromResponse($data['chat']));
        }
        if (isset($data['chat'], $data['chat']['first_name'])) {
            $instance->setChat(User::fromResponse($data['chat']));
        }

        if (isset($data['audio'])) {
            $instance->setAudio(Audio::fromResponse($data['audio']));
        }
        if (isset($data['document'])) {
            $instance->setDocument(Document::fromResponse($data['document']));
        }
        if (isset($data['sticker'])) {
            $instance->setSticker(Sticker::fromResponse($data['sticker']));
        }
        if (isset($data['contact'])) {
            $instance->setContact(Contact::fromResponse($data['contact']));
        }
        if (isset($data['location'])) {
            $instance->setLocation(Location::fromResponse($data['location']));
        }
        if (isset($data['video'])) {
            $instance->setVideo(Video::fromResponse($data['video']));
        }

        if (isset($data['reply_to_message'])) {
            $instance->setReplyToMessage(Message::fromResponse($data['reply_to_message']));
        }

        if (isset($data['text'])) {
            $instance->setText($data['text']);
        }
        if (isset($data['new_chat_title'])) {
            $instance->setNewChatTitle($data['new_chat_title']);
        }
        if (isset($data['forward_from'])) {
            $instance->setForwardFrom(User::fromResponse($data['forward_from']));
        }
        if (isset($data['forward_date'])) {
            $instance->setForwardDate($data['forward_date']);
        }
        if (isset($data['new_chat_participant'])) {
            $instance->setNewChatParticipant(User::fromResponse($data['new_chat_participant']));
        }
        if (isset($data['left_chat_participant'])) {
            $instance->setLeftChatParticipant(User::fromResponse($data['left_chat_participant']));
        }

        if (isset($data['new_chat_photo'])) {
            $newChatPhoto = array();
            foreach ($data['new_chat_photo'] as $newChatPhotoItem) {
                $newChatPhoto[] = PhotoSize::fromResponse($newChatPhotoItem);
            }
            $instance->setNewChatPhoto($newChatPhoto);
        }

        if (isset($data['photo'])) {
            $photo = array();
            foreach ($data['photo'] as $photoItem) {
                $photo[] = PhotoSize::fromResponse($photoItem);
            }
            $instance->setPhoto($photo);
        }


        if (isset($data['group_chat_created'])) {
            $instance->setGroupChatCreated($data['group_chat_created']);
        }

        return $instance;
    }
}
