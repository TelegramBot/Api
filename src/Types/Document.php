<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Document
 * This object represents a general file (as opposed to photos and audio files).
 * Telegram users can send files of any type of up to 1.5 GB in size.
 *
 * @package TelegramBot\Api\Types
 */
class Document implements TypeInterface
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Document thumbnail as defined by sender
     *
     * @var \TelegramBot\Api\Types\PhotoSize
     */
    protected $thumb;

    /**
     * Optional. Original filename as defined by sender
     *
     * @var string
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var int
     */
    protected $mimeType;

    /**
     * Optional. File size
     *
     * @var int
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
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     */
    public function setFileSize($fileSize)
    {
        if (is_numeric($fileSize)) {
            $this->fileSize = $fileSize;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return int
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param int $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return PhotoSize
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     */
    public function setThumb(PhotoSize $thumb)
    {
        $this->thumb = $thumb;
    }

    public static function fromResponse($data)
    {
        $instance = new self();

        if (!isset($data['file_id'], $data['thumb'])) {
            throw new InvalidArgumentException();
        }
        $instance->setFileId($data['file_id']);
        $instance->setThumb(PhotoSize::fromResponse($data['thumb']));

        if (isset($data['mime_type'])) {
            $instance->setMimeType($data['mime_type']);
        }
        if (isset($data['file_size'])) {
            $instance->setFileSize($data['file_size']);
        }

        return $instance;
    }
}
