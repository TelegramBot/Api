<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Sticker
 * This object represents a sticker.
 *
 * @package TelegramBot\Api\Types
 */
class Sticker implements TypeInterface
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Sticker width
     *
     * @var int
     */
    protected $width;

    /**
     * Sticker height
     *
     * @var int
     */
    protected $height;

    /**
     * Document thumbnail as defined by sender
     *
     * @var \TelegramBot\Api\Types\PhotoSize
     */
    protected $thumb;

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
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        if (is_numeric($height)) {
            $this->height = $height;
        } else {
            throw new InvalidArgumentException();
        }
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

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        if (is_numeric($width)) {
            $this->width = $width;
        } else {
            throw new InvalidArgumentException();
        }
    }

    public static function fromResponse($data)
    {
        $instance = new self();

        if (!isset($data['file_id'], $data['thumb'], $data['width'], $data['height'])) {
            throw new InvalidArgumentException();
        }
        $instance->setFileId($data['file_id']);
        $instance->setWidth($data['width']);
        $instance->setHeight($data['height']);
        $instance->setThumb(PhotoSize::fromResponse($data['thumb']));

        if (isset($data['file_size'])) {
            $instance->setFileSize($data['file_size']);
        }

        return $instance;
    }
}