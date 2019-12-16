<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Video
 * This object represents a video file.
 *
 * @package TelegramBot\Api\Types
 */
class Video extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['file_id', 'width', 'height', 'duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'file_id' => true,
        'width' => true,
        'height' => true,
        'duration' => true,
        'thumb' => PhotoSize::class,
        'mime_type' => true,
        'file_size' => true
    ];

    /**
     * Identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Video width as defined by sender
     *
     * @var int
     */
    protected $width;

    /**
     * Video height as defined by sender
     *
     * @var int
     */
    protected $height;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int
     */
    protected $duration;

    /**
     * Video thumbnail
     *
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * Optional. Mime type of a file as defined by sender
     *
     * @var string|null
     */
    protected $mimeType;

    /**
     * Optional. File size
     *
     * @var int|null
     */
    protected $fileSize;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return Video
     */
    public function setFileId(string $fileId): Video
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Video
     */
    public function setWidth(int $width): Video
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Video
     */
    public function setHeight(int $height): Video
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return Video
     */
    public function setDuration(int $duration): Video
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return PhotoSize
     */
    public function getThumb(): PhotoSize
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     * @return Video
     */
    public function setThumb(PhotoSize $thumb): Video
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return Video
     */
    public function setMimeType(string $mimeType): Video
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     * @return Video
     */
    public function setFileSize(int $fileSize): Video
    {
        $this->fileSize = $fileSize;

        return $this;
    }
}
