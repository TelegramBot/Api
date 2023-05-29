<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class StickerSet
 * This object represents a sticker set.
 *
 * @package TelegramBot\Api\Types
 * @author bernard-ng <bernard@devscast.tech>
 */
class StickerSet extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['name', 'title', 'sticker_type', 'is_animated', 'is_video', 'stickers'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'name' => true,
        'title' => true,
        'sticker_type' => true,
        'is_animated' => true,
        'is_video' => true,
        'stickers' => ArrayOfSticker::class,
        'thumbnail' => PhotoSize::class,
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
     * Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
     *
     * @var string
     */
    protected $stickerType;

    /**
     * True, if the sticker set contains animated stickers
     *
     * @var bool
     */
    protected $isAnimated;

    /**
     * True, if the sticker set contains video stickers
     *
     * @var bool
     */
    protected $isVideo;

    /**
     * List of all set stickers
     *
     * @var ArrayOfSticker
     */
    protected $stickers;

    /**
     * Optional. Sticker set thumbnail in the .WEBP or .TGS format
     *
     * @var PhotoSize|null
     */
    protected $thumbnail;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getStickerType()
    {
        return $this->stickerType;
    }

    /**
     * @param string $stickerType
     *
     * @return void
     */
    public function setStickerType($stickerType)
    {
        $this->stickerType = $stickerType;
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
     * @return ArrayOfSticker
     */
    public function getStickers()
    {
        return $this->stickers;
    }

    /**
     * @param ArrayOfSticker $stickers
     *
     * @return void
     */
    public function setStickers($stickers)
    {
        $this->stickers = $stickers;
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
    public function setThumbnail($thumbnail)
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
}
