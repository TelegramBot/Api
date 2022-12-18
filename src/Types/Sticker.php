<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

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
    static protected $requiredParams = [
        'file_id',
        'file_unique_id',
        'type',
        'width',
        'height',
        'is_animated',
        'is_video'
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'file_id' => true,
        'width' => true,
        'height' => true,
        'thumb' => PhotoSize::class,
        'file_size' => true,
        'type' => true,
        'file_unique_id' => true,
        'premium_animation' => true,
        'is_animated' => true,
        'is_video' => true,
        'emoji' => true,
        'set_name' => true,
        'mask_position' => MaskPosition::class,
        'custom_emoji_id' => true,
    ];

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
     * 	Optional. Sticker thumbnail in the .WEBP or .JPG format
     *
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;

    /**
     * Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”.
     * The type of the sticker is independent from its format,
     * which is determined by the fields is_animated and is_video.
     *
     * @var string
     */
    protected $type;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected $fileUniqueId;

    /**
     * Optional. For premium regular stickers, premium animation for the sticker
     *
     * @var File
     */
    protected $premiumAnimation;

    /**
     * True, if the sticker is animated
     *
     * @var bool
     */
    protected $isAnimated;

    /**
     * True, if the sticker is a video sticker
     *
     * @var bool
     */
    protected $isVideo;

    /**
     * Optional. Emoji associated with the sticker
     *
     * @var string
     */
    protected $emoji;

    /**
     * Optional. Name of the sticker set to which the sticker belongs
     *
     * @var string
     */
    protected $setName;

    /**
     * Optional. For mask stickers, the position where the mask should be placed
     *
     * @var MaskPosition
     */
    protected $maskPosition;

    /**
     * Optional. For custom emoji stickers, unique identifier of the custom emoji
     *
     * @var string
     */
    protected $customEmojiId;

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
     *
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
        if (is_integer($width)) {
            $this->width = $width;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     */
    public function setFileUniqueId($fileUniqueId)
    {
        $this->fileUniqueId = $fileUniqueId;
    }

    /**
     * @return File
     */
    public function getPremiumAnimation()
    {
        return $this->premiumAnimation;
    }

    /**
     * @param File $premiumAnimation
     */
    public function setPremiumAnimation(File $premiumAnimation)
    {
        $this->premiumAnimation = $premiumAnimation;
    }

    /**
     * @return bool
     */
    public function getIsAnimated()
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
    public function getIsVideo()
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
    public function setMaskPosition(MaskPosition $maskPosition)
    {
        $this->maskPosition = $maskPosition;
    }

    /**
     * @return string
     */
    public function getCustomEmojiId()
    {
        return $this->customEmojiId;
    }

    /**
     * @param string $customEmojiId
     */
    public function setCustomEmojiId($customEmojiId)
    {
        $this->customEmojiId = $customEmojiId;
    }
}
