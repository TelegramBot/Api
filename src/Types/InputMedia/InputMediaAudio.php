<?php

namespace TelegramBot\Api\Types\InputMedia;

use CURLFile;
use TelegramBot\Api\Types\ArrayOfMessageEntity;

/**
 * Class InputMediaAudio
 * Represents a audio to be sent.
 *
 * @package TelegramBot\Api
 */
class InputMediaAudio extends InputMedia
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'type' => true,
        'media' => true,
        'thumb' => true,
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => ArrayOfMessageEntity::class,
        'duration' => true,
        'performer' => true,
        'title' => true,
    ];

    /**
     * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation
     * for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail's width and height should not exceed 320. Ignored if the file is
     * not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded
     * using multipart/form-data under <file_attach_name>
     *
     * @var CURLFile|string
     */
    protected $thumb;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     */
    protected $captionEntities;

    /**
     * Optional. Video duration.
     *
     * @var string
     */
    protected $duration;

    /**
     * Optional. Performer of the audio.
     *
     * @var string
     */
    protected $performer;

    /**
     * Optional. Title of the audio.
     *
     * @var string
     */
    protected $title;

    /**
     * InputMediaVideo constructor.
     *
     * @param string $media
     * @param string|null $caption
     * @param string|null $parseMode
     * @param string|null $thumb
     * @param string|null $duration
     * @param string|null $performer
     * @param string|null $title
     */
    public function __construct(
        $media,
        $caption = null,
        $parseMode = null,
        $thumb = null,
        $duration = null,
        $performer = null,
        $title = null
    )
    {
        $this->type = 'audio';
        $this->media = $media;
        $this->caption = $caption;
        $this->parseMode = $parseMode;
        $this->thumb = $thumb;
        $this->duration = $duration;
        $this->performer = $performer;
        $this->title = $title;
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
     * @return string
     */
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * @param string $parseMode
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return mixed
     */
    public function getCaptionEntities()
    {
        return $this->captionEntities;
    }

    /**
     * @param mixed $captionEntities
     */
    public function setCaptionEntities($captionEntities)
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * @param string $performer
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}
