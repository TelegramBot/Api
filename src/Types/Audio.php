<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Audio
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @package TelegramBot\Api\Types
 */
class Audio extends BaseType implements TypeInterface
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
        'performer' => true,
        'title' => true,
        'mime_type' => true,
        'file_size' => true,
        'thumb' => PhotoSize::class,
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
     * Optional. Performer of the audio as defined by sender or by audio tags
     *
     * @var string|null
     */
    protected $performer;

    /**
     * Optional. Title of the audio as defined by sender or by audio tags
     *
     * @var string|null
     */
    protected $title;

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
     * Optional. Thumbnail of the album cover to which the music file belongs
     *
     * @var PhotoSize|null
     */
    protected $thumb;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return Audio
     */
    public function setFileId(string $fileId): Audio
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
     * @return Audio
     */
    public function setDuration(int $duration): Audio
    {
        $this->duration = $duration;
        return $this;
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
     * @return Audio
     */
    public function setPerformer(string $performer): Audio
    {
        $this->performer = $performer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Audio
     */
    public function setTitle(string $title): Audio
    {
        $this->title = $title;

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
     * @return Audio
     */
    public function setMimeType(string $mimeType): Audio
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
     * @return Audio
     */
    public function setFileSize(int $fileSize): Audio
    {
        $this->fileSize = $fileSize;

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
     * @return Audio
     */
    public function setThumb(PhotoSize $thumb): Audio
    {
        $this->thumb = $thumb;

        return $this;
    }
}
