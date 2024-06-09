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
        'file_name' => true,
        'mime_type' => true,
        'file_size' => true,
        'thumbnail' => PhotoSize::class
    ];

    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected $fileUniqueId;

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
     * Optional. Original filename as defined by sender
     *
     * @var string|null
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string|null
     */
    protected $mimeType;

    /**
     * Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
     *
     * @var int|null
     */
    protected $fileSize;

    /**
     * Optional. Thumbnail of the album cover to which the music file belongs
     *
     * @var PhotoSize|null
     */
    protected $thumbnail;

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

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
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
     * @return string|null
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     * @return void
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     * @return void
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string|null
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string|null $mimeType
     * @return void
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int|null
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param int|null $fileSize
     * @return void
     * @throws InvalidArgumentException
     */
    public function setFileSize($fileSize)
    {
        if (is_integer($fileSize) || is_null($fileSize)) {
            $this->fileSize = $fileSize;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize|null $thumbnail
     * @return void
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }
}
