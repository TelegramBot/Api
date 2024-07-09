<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Payments\Invoice;

/**
 * Class ExternalReplyInfo
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 *
 * @package TelegramBot\Api\Types
 */
class ExternalReplyInfo extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['origin'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'origin' => MessageOrigin::class,
        'chat' => Chat::class,
        'message_id' => true,
        'link_preview_options' => LinkPreviewOptions::class,
        'animation' => Animation::class,
        'audio' => Audio::class,
        'document' => Document::class,
        'photo' => ArrayOfPhotoSize::class,
        'sticker' => Sticker::class,
        'story' => Story::class,
        'video' => Video::class,
        'video_note' => VideoNote::class,
        'voice' => Voice::class,
        'has_media_spoiler' => true,
        'contact' => Contact::class,
        'dice' => Dice::class,
        'game' => Game::class,
        'giveaway' => Giveaway::class,
        'giveaway_winners' => GiveawayWinners::class,
        'invoice' => Invoice::class,
        'location' => Location::class,
        'poll' => Poll::class,
        'venue' => Venue::class,
    ];

    /**
     * Origin of the message replied to by the given message
     *
     * @var MessageOrigin
     */
    protected $origin;

    /**
     * Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     *
     * @var Chat|null
     */
    protected $chat;

    /**
     * Optional. Unique message identifier inside the original chat. Available only if the original chat is a supergroup or a channel.
     *
     * @var int|null
     */
    protected $messageId;

    /**
     * Optional. Options used for link preview generation for the original message, if it is a text message
     *
     * @var LinkPreviewOptions|null
     */
    protected $linkPreviewOptions;

    /**
     * Optional. Message is an animation, information about the animation
     *
     * @var Animation|null
     */
    protected $animation;

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
     * Optional. Message is a photo, available sizes of the photo
     *
     * @var array|null
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var Sticker|null
     */
    protected $sticker;

    /**
     * Optional. Message is a forwarded story
     *
     * @var Story|null
     */
    protected $story;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var Video|null
     */
    protected $video;

    /**
     * Optional. Message is a video note, information about the video message
     *
     * @var VideoNote|null
     */
    protected $videoNote;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var Voice|null
     */
    protected $voice;

    /**
     * Optional. True, if the message media is covered by a spoiler animation
     *
     * @var bool|null
     */
    protected $hasMediaSpoiler;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var Contact|null
     */
    protected $contact;

    /**
     * Optional. Message is a dice with random value
     *
     * @var Dice|null
     */
    protected $dice;

    /**
     * Optional. Message is a game, information about the game
     *
     * @var Game|null
     */
    protected $game;

    /**
     * Optional. Message is a scheduled giveaway, information about the giveaway
     *
     * @var Giveaway|null
     */
    protected $giveaway;

    /**
     * Optional. A giveaway with public winners was completed
     *
     * @var GiveawayWinners|null
     */
    protected $giveawayWinners;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice
     *
     * @var Invoice|null
     */
    protected $invoice;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var Location|null
     */
    protected $location;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var Poll|null
     */
    protected $poll;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var Venue|null
     */
    protected $venue;

    /**
     * @return MessageOrigin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param MessageOrigin $origin
     * @return void
     */
    public function setOrigin(MessageOrigin $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return Chat|null
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat|null $chat
     * @return void
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return int|null
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int|null $messageId
     * @return void
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
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
     * @return void
     */
    public function setLinkPreviewOptions($linkPreviewOptions)
    {
        $this->linkPreviewOptions = $linkPreviewOptions;
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return array|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param array|null $photo
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function setVoice($voice)
    {
        $this->voice = $voice;
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
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function setGame($game)
    {
        $this->game = $game;
    }

    /**
     * @return Giveaway|null
     */
    public function getGiveaway()
    {
        return $this->giveaway;
    }

    /**
     * @param Giveaway|null $giveaway
     * @return void
     */
    public function setGiveaway($giveaway)
    {
        $this->giveaway = $giveaway;
    }

    /**
     * @return GiveawayWinners|null
     */
    public function getGiveawayWinners()
    {
        return $this->giveawayWinners;
    }

    /**
     * @param GiveawayWinners|null $giveawayWinners
     * @return void
     */
    public function setGiveawayWinners($giveawayWinners)
    {
        $this->giveawayWinners = $giveawayWinners;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     * @return void
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
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
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
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
     * @return void
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
     * @return void
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }
}
