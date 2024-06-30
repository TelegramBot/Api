<?php

namespace TelegramBot\Api\Types\InputMedia;

use TelegramBot\Api\InvalidArgumentException;

/**
 * Class InputMediaAudio
 * Represents an audio file to be treated as music to be sent.
 *
 * @package TelegramBot\Api\Types
 */
class InputMediaAudio extends InputMedia
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'media'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'media' => true,
        'thumbnail' => true,
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => true,
        'duration' => true,
        'performer' => true,
        'title' => true
    ];

    /**
     * Type of the result, must be audio
     *
     * @var string
     */
    protected $type = 'audio';

    /**
     * File to send
     *
     * @var string
     */
    protected $media;

    /**
     * Optional. Thumbnail of the file sent
     *
     * @var string|null
     */
    protected $thumbnail;

    /**
     * Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the audio caption
     *
     * @var string|null
     */
    protected $parseMode;

    /**
     * Optional. List of special entities that appear in the caption
     *
     * @var array|null
     */
    protected $captionEntities;

    /**
     * Optional. Duration of the audio in seconds
     *
     * @var int|null
     */
    protected $duration;

    /**
     * Optional. Performer of the audio
     *
     * @var string|null
     */
    protected $performer;

    /**
     * Optional. Title of the audio
     *
     * @var string|null
     */
    protected $title;

    /**
     * @param array $data
     * @return static
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
    }

    /**
     * @param string $media
     */
    public function setMedia(string $media): void
    {
        $this->media = $media;
    }

    /**
     * @return string|null
     */
    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    /**
     * @param string|null $thumbnail
     */
    public function setThumbnail(?string $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     */
    public function setParseMode(?string $parseMode): void
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return array|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param array|null $captionEntities
     */
    public function setCaptionEntities(?array $captionEntities): void
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     */
    public function setDuration(?int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     */
    public function setPerformer(?string $performer): void
    {
        $this->performer = $performer;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }
}
