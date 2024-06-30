<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Document
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 * Telegram users can send files of any type of up to 1.5 GB in size.
 *
 * @package TelegramBot\Api\Types
 */
class Document extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'thumbnail' => PhotoSize::class,
        'file_name' => true,
        'mime_type' => true,
        'file_size' => true
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['file_id', 'file_unique_id'];

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
     * Optional. Document thumbnail as defined by sender
     *
     * @var PhotoSize|null
     */
    protected $thumbnail;

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
}
