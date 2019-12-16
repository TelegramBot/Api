<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Animation
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound)
 *
 * @package TelegramBot\Api\Types
 */
class Animation extends BaseType implements TypeInterface
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
        'file_name' => true,
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
     * Optional. Animation thumbnail as defined by sender
     *
     * @var PhotoSize|null
     */
    protected $thumb;

    /**
     * Optional. Original animation filename as defined by sender
     *
     * @var PhotoSize
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by sender
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
     * @return Animation
     */
    public function setFileId(string $fileId): Animation
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
     * @return Animation
     */
    public function setWidth(int $width): Animation
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
     * @return Animation
     */
    public function setHeight(int $height): Animation
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
     * @return Animation
     */
    public function setDuration(int $duration): Animation
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     * @return Animation
     */
    public function setThumb(PhotoSize $thumb): Animation
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * @return PhotoSize
     */
    public function getFileName(): PhotoSize
    {
        return $this->fileName;
    }

    /**
     * @param PhotoSize $fileName
     * @return Animation
     */
    public function setFileName(PhotoSize $fileName): Animation
    {
        $this->fileName = $fileName;

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
     * @param string|null $mimeType
     * @return Animation
     */
    public function setMimeType(string $mimeType): Animation
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
     * @return Animation
     */
    public function setFileSize(int $fileSize): Animation
    {
        $this->fileSize = $fileSize;

        return $this;
    }
}
