<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Sticker extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['file_id', 'file_unique_id', 'width', 'height', 'is_animated'];

    /**
     * @var array
     */
    protected static array $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'width' => true,
        'height' => true,
        'is_animated' => true,
        'thumb' => PhotoSize::class,
        'set_name' => true,
        'emoji' => true,
        'mask_position' => MaskPosition::class,
        'file_size' => true,
    ];

    /**
     * Identifier for this file, which can be used to download or reuse the file
     *
     * @var string
     */
    protected string $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected string $fileUniqueId;

    /**
     * Sticker width
     *
     * @var int
     */
    protected int $width;

    /**
     * Sticker height
     *
     * @var int
     */
    protected int $height;

    /**
     * True, if the sticker is animated
     *
     * @var bool
     */
    protected bool $isAnimated;

    /**
     * Optional. Sticker thumbnail in the .WEBP or .JPG format
     *
     * @var PhotoSize
     */
    protected PhotoSize $thumb;

    /**
     * Optional. Emoji associated with the sticker
     *
     * @var string
     */
    protected string $emoji;

    /**
     * Optional. Name of the sticker set to which the sticker belongs
     *
     * @var string
     */
    protected string $setName;

    /**
     * Optional. For mask stickers, the position where the mask should be placed
     *
     * @var MaskPosition
     */
    protected MaskPosition $maskPosition;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected int $fileSize;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     */
    public function setFileId(string $fileId): void
    {
        $this->fileId = $fileId;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->fileUniqueId;
    }

    /**
     * @param string $fileUniqueId
     */
    public function setFileUniqueId(string $fileUniqueId): void
    {
        $this->fileUniqueId = $fileUniqueId;
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
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
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
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
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
     */
    public function setIsAnimated(bool $isAnimated): void
    {
        $this->isAnimated = $isAnimated;
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
     */
    public function setThumb(PhotoSize $thumb): void
    {
        $this->thumb = $thumb;
    }

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     */
    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

    /**
     * @return string
     */
    public function getSetName(): string
    {
        return $this->setName;
    }

    /**
     * @param string $setName
     */
    public function setSetName(string $setName): void
    {
        $this->setName = $setName;
    }

    /**
     * @return MaskPosition
     */
    public function getMaskPosition(): MaskPosition
    {
        return $this->maskPosition;
    }

    /**
     * @param MaskPosition $maskPosition
     */
    public function setMaskPosition(MaskPosition $maskPosition): void
    {
        $this->maskPosition = $maskPosition;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     */
    public function setFileSize(int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
}
