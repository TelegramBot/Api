<?php

declare(strict_types=1);

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class InputSticker.
 * This object describes a sticker to be added to a sticker set.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
class InputSticker extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['sticker', 'format', 'emoji_list'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'sticker' => true,
        'format' => true,
        'emoji_list' => true,
        'mask_position' => MaskPosition::class,
        'keywords' => true,
    ];

    /**
     * The added sticker.
     * Pass a file_id as a String to send a file that already exists on the Telegram servers,
     * pass an HTTP URL as a String for Telegram to get a file from the Internet,
     * upload a new one using multipart/form-data, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
     * Animated and video stickers can't be uploaded via HTTP URL.
     *
     * @var string
     * @see https://core.telegram.org/bots/api#sending-files
     */
    protected string $sticker;

    /**
     * Format of the added sticker, must be one of “static”
     * for a .WEBP or .PNG image, “animated” for a .TGS animation, “video” for a WEBM video
     *
     * @var string
     */
    protected string $format;

    /**
     * List of 1-20 emoji associated with the sticker
     *
     * @var string[]
     */
    protected array $emojiList;

    /**
     * Optional. Position where the mask should be placed on faces. For “mask” stickers only.
     *
     * @var MaskPosition|null
     */
    protected $maskPosition;

    /**
     * Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters.
     * For “regular” and “custom_emoji” stickers only.
     *
     * @var string[]
     */
    protected $keywords;

    /**
     * @return string
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param string $sticker
     * @return void
     */
    public function setSticker(string $sticker)
    {
        $this->sticker = $sticker;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return void
     */
    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    /**
     * @return string[]
     */
    public function getEmojiList()
    {
        return $this->emojiList;
    }

    /**
     * @param string[] $emojiList
     * @return void
     */
    public function setEmojiList(array $emojiList)
    {
        $this->emojiList = $emojiList;
    }

    /**
     * @return MaskPosition|null
     */
    public function getMaskPosition()
    {
        return $this->maskPosition;
    }

    /**
     * @param MaskPosition|null $maskPosition
     * @return void
     */
    public function setMaskPosition($maskPosition)
    {
        $this->maskPosition = $maskPosition;
    }

    /**
     * @return string[]
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string[] $keywords
     * @return void
     */
    public function setKeywords(array $keywords)
    {
        $this->keywords = $keywords;
    }
}
