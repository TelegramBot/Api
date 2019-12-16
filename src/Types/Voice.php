<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Voice
 * This object represents a voice note
 *
 * @package TelegramBot\Api\Types
 */
class Voice extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['file_id', 'duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'file_id' => true,
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
     * @return Voice
     */
    public function setFileId(string $fileId): Voice
    {
        $this->fileId = $fileId;

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
     * @return Voice
     */
    public function setDuration(int $duration): Voice
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
     * @return Voice
     */
    public function setMimeType(string $mimeType): Voice
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
     * @return Voice
     */
    public function setFileSize(int $fileSize): Voice
    {
        $this->fileSize = $fileSize;

        return $this;
    }
}
