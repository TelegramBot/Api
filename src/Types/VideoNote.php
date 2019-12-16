<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class VideoNote
 * This object represents a voice note
 *
 * @package TelegramBot\Api\Types
 */
class VideoNote extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['file_id', 'length', 'duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'file_id' => true,
        'length' => true,
        'duration' => true,
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
     * Video width and height (diameter of the video message) as defined by sender
     *
     * @var int
     */
    protected $length;

    /**
     * Duration of the audio in seconds as defined by sender
     *
     * @var int
     */
    protected $duration;

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
     * @return VideoNote
     */
    public function setFileId(string $fileId): VideoNote
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return VideoNote
     */
    public function setLength(int $length): VideoNote
    {
        $this->length = $length;
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
     * @return VideoNote
     */
    public function setDuration(int $duration): VideoNote
    {
        $this->duration = $duration;

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
     * @return VideoNote
     */
    public function setMimeType(string $mimeType): VideoNote
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
     * @return VideoNote
     */
    public function setFileSize(int $fileSize): VideoNote
    {
        $this->fileSize = $fileSize;

        return $this;
    }
}
