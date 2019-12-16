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
    static protected $requiredParams = ['file_id', 'width', 'height', 'is_animated'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'file_id' => true,
        'width' => true,
        'height' => true,
        'is_animated' => true,
        'thumb' => PhotoSize::class,
        'emoji' => true,
        'set_name' => true,
//        'mask_position' => MaskPosition::class,
        'file_size' => true,
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
     * True, if the sticker is animated
     *
     * @var bool
     */
    protected $isAnimated;

    /**
     * Document thumbnail as defined by sender
     *
     * @var PhotoSize
     */
    protected $thumb;

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
     * @TODO: implement
     */
    protected $maskPosition;

    /**
     * Optional. File size
     *
     * @var int|null
     */
    protected $fileSize;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return Sticker
     */
    public function setFileId(string $fileId): Sticker
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Sticker
     */
    public function setWidth(int $width): Sticker
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Sticker
     */
    public function setHeight(int $height): Sticker
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAnimated(): bool
    {
        return $this->isAnimated;
    }

    /**
     * @param bool $isAnimated
     * @return Sticker
     */
    public function setIsAnimated(bool $isAnimated): Sticker
    {
        $this->isAnimated = $isAnimated;

        return $this;
    }

    /**
     * @return PhotoSize
     */
    public function getThumb(): PhotoSize
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     * @return Sticker
     */
    public function setThumb(PhotoSize $thumb): Sticker
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     * @return Sticker
     */
    public function setEmoji(string $emoji): Sticker
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSetName(): ?string
    {
        return $this->setName;
    }

    /**
     * @param string $setName
     * @return Sticker
     */
    public function setSetName(string $setName): Sticker
    {
        $this->setName = $setName;

        return $this;
    }

    /**
     * @return MaskPosition|null
     */
    public function getMaskPosition(): ?MaskPosition
    {
        return $this->maskPosition;
    }

    /**
     * @param MaskPosition $maskPosition
     * @return Sticker
     */
    public function setMaskPosition(MaskPosition $maskPosition): Sticker
    {
        $this->maskPosition = $maskPosition;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     * @return Sticker
     */
    public function setFileSize(int $fileSize): Sticker
    {
        $this->fileSize = $fileSize;

        return $this;
    }
}
