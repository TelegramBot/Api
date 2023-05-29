<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class VideoNote
 * This object represents a video message (available in Telegram apps as of v.4.0).
 *
 * @package TelegramBot\Api\Types
 */
class VideoNote extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['file_id', 'file_unique_id', 'length', 'duration'];

    protected static $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'length' => true,
        'duration' => true,
        'thumbnail' => PhotoSize::class,
        'file_size' => true,
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
     * Video width and height (diameter of the video message) as defined by sender
     *
     * @var int
     */
    protected $length;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int
     */
    protected $duration;

    /**
     * Optional. Video thumbnail
     *
     * @var PhotoSize|null
     */
    protected $thumbnail;

    /**
     * Optional. File size in bytes
     *
     * @var int|null
     */
    protected $fileSize;

    /**
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     *
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
     *
     * @return void
     */
    public function setFileUniqueId($fileUniqueId)
    {
        $this->fileUniqueId = $fileUniqueId;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return void
     */
    public function setLength($length)
    {
        $this->length = $length;
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
     *
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize $thumbnail
     *
     * @return void
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @deprecated use getThumbnail method
     *
     * @return PhotoSize|null
     */
    public function getThumb()
    {
        return $this->getThumbnail();
    }

    /**
     * @deprecated use setThumbnail method
     *
     * @param PhotoSize $thumb
     *
     * @return void
     */
    public function setThumb($thumb)
    {
        $this->setThumbnail($thumb);
    }

    /**
     * @return int|null
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     *
     * @return void
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
    }
}
