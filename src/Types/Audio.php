<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Audio extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['file_id', 'duration'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'file_id' => true,
        'duration' => true,
        'performer' => true,
        'title' => true,
        'mime_type' => true,
        'file_size' => true
    ];

    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected string $fileId;

    /**
     * Photo width
     *
     * @var int
     */
    protected int $duration;

    /**
     * Optional. Performer of the audio as defined by sender or by audio tags
     *
     * @var string
     */
    protected string $performer;

    /**
     * Optional. Title of the audio as defined by sender or by audio tags
     *
     * @var string
     */
    protected string $title;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string
     */
    protected string $mimeType;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected int $fileSize;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     */
    public function setFileId(string $fileId): void
    {
        $this->fileId = $fileId;
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
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getPerformer(): string
    {
        return $this->performer;
    }

    /**
     * @param string $performer
     */
    public function setPerformer(string $performer): void
    {
        $this->performer = $performer;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType(string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     */
    public function setFileSize(int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
}
