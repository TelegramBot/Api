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
    protected static $requiredParams = [
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
    protected static $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'type' => true,
        'width' => true,
        'height' => true,
        'is_animated' => true,
        'is_video' => true,
        'thumbnail' => PhotoSize::class,
        'file_size' => true,
        'premium_animation' => File::class,
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
     * @var PhotoSize|null
     */
    protected $thumbnail;

    /**
     * Optional. File size
     *
     * @var int|null
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
     * @var File|null
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
     * @var string|null
     */
    protected $emoji;

    /**
     * Optional. Name of the sticker set to which the sticker belongs
     *
     * @var string|null
     */
    protected $setName;

    /**
     * Optional. For mask stickers, the position where the mask should be placed
     *
     * @var MaskPosition|null
     */
    protected $maskPosition;

    /**
     * Optional. For custom emoji stickers, unique identifier of the custom emoji
     *
     * @var string|null
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
     *
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
     *
     * @throws InvalidArgumentException
     *
     * @return void
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
     * @param mixed $height
     *
     * @throws InvalidArgumentException
     *
     * @return void
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
    public function setThumbnail(PhotoSize $thumbnail)
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
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     *
     * @throws InvalidArgumentException
     *
     * @return void
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
     *
     * @return void
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
     *
     * @return void
     */
    public function setFileUniqueId($fileUniqueId)
    {
        $this->fileUniqueId = $fileUniqueId;
    }

    /**
     * @return File|null
     */
    public function getPremiumAnimation()
    {
        return $this->premiumAnimation;
    }

    /**
     * @param File $premiumAnimation
     *
     * @return void
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
     *
     * @return void
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
     *
     * @return void
     */
    public function setIsVideo($isVideo)
    {
        $this->isVideo = $isVideo;
    }

    /**
     * @return null|string
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     *
     * @return void
     */
    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;
    }

    /**
     * @return null|string
     */
    public function getSetName()
    {
        return $this->setName;
    }

    /**
     * @param string $setName
     *
     * @return void
     */
    public function setSetName($setName)
    {
        $this->setName = $setName;
    }

    /**
     * @return MaskPosition|null
     */
    public function getMaskPosition()
    {
        return $this->maskPosition;
    }

    /**
     * @param MaskPosition $maskPosition
     *
     * @return void
     */
    public function setMaskPosition(MaskPosition $maskPosition)
    {
        $this->maskPosition = $maskPosition;
    }

    /**
     * @return null|string
     */
    public function getCustomEmojiId()
    {
        return $this->customEmojiId;
    }

    /**
     * @param string $customEmojiId
     *
     * @return void
     */
    public function setCustomEmojiId($customEmojiId)
    {
        $this->customEmojiId = $customEmojiId;
    }
}
