<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\InvalidArgumentException;

/**
 * Class Sticker
 * This object represents a sticker.
 *
 * @package TelegramBot\Api\Types
 */
class Sticker extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['file_id', 'file_unique_id', 'width', 'height'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'width' => true,
        'height' => true,
        'is_animated' => true,
        'is_video' => true,
        'thumb' => PhotoSize::class,
        'emoji' => true,
        'set_name' => true,
        'mask_position' => MaskPosition::class,
        'file_size' => true,
    ];

    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file
     *
     * @var string
     */
    protected $fileUniqueId;

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
     * True, if the sticker is animated
     *
     * @var bool
     */
    protected $isAnimated;

    /**
     * True, if the sticker is a video
     *
     * @var bool
     */
    protected $isVideo;

    /**
     * Document thumbnail as defined by sender
     *
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * Emoji associated with the sticker
     *
     * @var string
     */
    protected $emoji;

    /**
     * Name of the sticker set to which the sticker belongs
     *
     * @var string
     */
    protected $setName;

    /**
     * For mask stickers, the position where the mask should be placed
     *
     * @var MaskPosition
     */
    protected $maskPosition;
    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;

    /**
     * @return string
     */
    public function getFileUniqueId()
    {
        return $this->fileUniqueId;
    }

    /**
     * @param string $fileUniqueId
     */
    public function setFileUniqueId($fileUniqueId)
    {
        $this->fileUniqueId = $fileUniqueId;
    }

    /**
     * @return bool
     */
    public function isAnimated()
    {
        return $this->isAnimated;
    }

    /**
     * @param bool $isAnimated
     */
    public function setIsAnimated($isAnimated)
    {
        $this->isAnimated = $isAnimated;
    }

    /**
     * @return bool
     */
    public function isVideo()
    {
        return $this->isVideo;
    }

    /**
     * @param bool $isVideo
     */
    public function setIsVideo($isVideo)
    {
        $this->isVideo = $isVideo;
    }

    /**
     * @return string
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     */
    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;
    }

    /**
     * @return string
     */
    public function getSetName()
    {
        return $this->setName;
    }

    /**
     * @param string $setName
     */
    public function setSetName($setName)
    {
        $this->setName = $setName;
    }

    /**
     * @return MaskPosition
     */
    public function getMaskPosition()
    {
        return $this->maskPosition;
    }

    /**
     * @param MaskPosition $maskPosition
     */
    public function setMaskPosition($maskPosition)
    {
        $this->maskPosition = $maskPosition;
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
     *
     * @throws InvalidArgumentException
     */
    public function setFileSize($fileSize)
    {
        if (is_int($fileSize)) {
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
     *
     * @throws InvalidArgumentException
     */
    public function setHeight($height)
    {
        if (is_int($height)) {
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
     *
     * @throws InvalidArgumentException
     */
    public function setWidth($width)
    {
        if (is_int($width)) {
            $this->width = $width;
        } else {
            throw new InvalidArgumentException();
        }
    }
}
