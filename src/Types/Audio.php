<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Audio
 * This object represents an audio file (voice note).
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
    protected static $requiredParams = ['file_id', 'file_unique_id', 'duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'file_id' => true,
        'file_unique_id' => true,
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
    protected $fileId;

    /**
     * Photo width
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
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected $fileUniqueId;

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     * @return void
     * @throws InvalidArgumentException
     */
    public function setDuration($duration)
    {
        if (is_integer($duration)) {
            $this->duration = $duration;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return null|string
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * @param string $performer
     * @return void
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return void
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
    }

    /**
     * @return int|null
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param mixed $fileSize
     * @return void
     * @throws InvalidArgumentException
     */
    public function setFileSize($fileSize)
    {
        if (is_integer($fileSize)) {
            $this->fileSize = $fileSize;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return null|string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return void
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return string
     */
    public function getFileUniqueId()
    {
        return $this->fileUniqueId;
    }

    /**
     * @param string $fileUniqueId
     * @return void
     */
    public function setFileUniqueId($fileUniqueId)
    {
        $this->fileUniqueId = $fileUniqueId;
    }
}
