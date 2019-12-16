<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class StickerSet
 * This object represents a sticker set.
 *
 * @package TelegramBot\Api\Types
 */
class StickerSet extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['name', 'title', 'is_animated', 'contains_masks', 'stickers'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'name' => true,
        'title' => true,
        'is_animated' => true,
        'contains_masks' => true,
        'stickers' => ArrayOfStickers::class,
    ];

    /**
     * Sticker set name
     *
     * @var string
     */
    protected $name;

    /**
     * Sticker set title
     *
     * @var string
     */
    protected $title;

    /**
     * True, if the sticker set contains animated stickers (https://telegram.org/blog/animated-stickers)
     *
     * @var bool
     */
    protected $isAnimated;

    /**
     * True, if the sticker set contains masks
     *
     * @var bool
     */
    protected $containsMasks;

    /**
     * List of all set stickers
     *
     * @var Sticker[]
     */
    protected $stickers;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return StickerSet
     */
    public function setName(string $name): StickerSet
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return StickerSet
     */
    public function setTitle(string $title): StickerSet
    {
        $this->title = $title;

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
     * @return StickerSet
     */
    public function setIsAnimated(bool $isAnimated): StickerSet
    {
        $this->isAnimated = $isAnimated;

        return $this;
    }

    /**
     * @return bool
     */
    public function isContainsMasks(): bool
    {
        return $this->containsMasks;
    }

    /**
     * @param bool $containsMasks
     * @return StickerSet
     */
    public function setContainsMasks(bool $containsMasks): StickerSet
    {
        $this->containsMasks = $containsMasks;

        return $this;
    }

    /**
     * @return Sticker[]
     */
    public function getStickers(): array
    {
        return $this->stickers;
    }

    /**
     * @param Sticker[] $stickers
     * @return StickerSet
     */
    public function setStickers(array $stickers): StickerSet
    {
        $this->stickers = $stickers;

        return $this;
    }
}
