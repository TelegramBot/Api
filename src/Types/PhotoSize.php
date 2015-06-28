<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class PhotoSize
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @package TelegramBot\Api\Types
 */
class PhotoSize extends BaseType implements TypeInterface
{
    static protected $requiredParams = array('file_id', 'width', 'height');

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
    protected $width;

    /**
     * Photo height
     *
     * @var int
     */
    protected $height;

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
        if (is_integer($fileSize)) {
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
        if (is_integer($height)) {
            $this->height = $height;
        } else {
            throw new InvalidArgumentException();
        }
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
        if (is_integer($width)) {
            $this->width = $width;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * Static constructor
     *
     * @param array $data
     *
     * @return \TelegramBot\Api\Types\PhotoSize
     */
    public static function fromResponse($data)
    {
        self::fromResponse($data);
        $instance = new self();

        $instance->setFileId($data['file_id']);
        $instance->setWidth($data['width']);
        $instance->setHeight($data['height']);


        if (isset($data['file_size'])) {
            $instance->setFileSize($data['file_size']);
        }

        return $instance;
    }
}
