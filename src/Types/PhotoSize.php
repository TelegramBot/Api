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
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['file_id', 'file_unique_id', 'width', 'height'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'width' => true,
        'height' => true,
        'file_size' => true,
    ];

    /**
     * Identifier for this file, which can be used to download or reuse the file
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
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return void
     * @throws InvalidArgumentException
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
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return void
     * @throws InvalidArgumentException
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
