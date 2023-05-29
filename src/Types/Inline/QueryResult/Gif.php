<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultGif
 * Represents a link to an animated GIF file.
 * By default, this animated GIF file will be sent by the user with optional caption.
 * Alternatively, you can provide InputMessageContent to send it instead of the animation.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class Gif extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'id', 'gif_url', 'thumbnail_url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'id' => true,
        'gif_url' => true,
        'gif_width' => true,
        'gif_height' => true,
        'thumbnail_url' => true,
        'title' => true,
        'caption' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $type = 'gif';

    /**
     * A valid URL for the GIF file. File size must not exceed 1MB
     *
     * @var string
     */
    protected $gifUrl;

    /**
     * Optional. Width of the GIF
     *
     * @var int|null
     */
    protected $gifWidth;

    /**
     * Optional. Height of the GIF
     *
     * @var int|null
     */
    protected $gifHeight;

    /**
     * URL of the static thumbnail for the result (jpeg or gif)
     *
     * @var string
     */
    protected $thumbnailUrl;

    /**
     * Optional. Caption of the GIF file to be sent, 0-200 characters
     *
     * @var string|null
     */
    protected $caption;

    /**
     * InlineQueryResultGif constructor.
     *
     * @param string $id
     * @param string $gifUrl
     * @param string|null $thumbnailUrl
     * @param int|null $gifWidth
     * @param int|null $gifHeight
     * @param string|null $title
     * @param string|null $caption
     * @param InputMessageContent $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        $id,
        $gifUrl,
        $thumbnailUrl = null,
        $title = null,
        $caption = null,
        $gifWidth = null,
        $gifHeight = null,
        $inputMessageContent = null,
        $inlineKeyboardMarkup = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->gifUrl = $gifUrl;
        $this->thumbnailUrl = is_null($thumbnailUrl) ? $gifUrl : $thumbnailUrl;
        $this->gifWidth = $gifWidth;
        $this->gifHeight = $gifHeight;
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getGifUrl()
    {
        return $this->gifUrl;
    }

    /**
     * @param string $gifUrl
     *
     * @return void
     */
    public function setGifUrl($gifUrl)
    {
        $this->gifUrl = $gifUrl;
    }

    /**
     * @return int|null
     */
    public function getGifWidth()
    {
        return $this->gifWidth;
    }

    /**
     * @param int|null $gifWidth
     *
     * @return void
     */
    public function setGifWidth($gifWidth)
    {
        $this->gifWidth = $gifWidth;
    }

    /**
     * @return int|null
     */
    public function getGifHeight()
    {
        return $this->gifHeight;
    }

    /**
     * @param int|null $gifHeight
     *
     * @return void
     */
    public function setGifHeight($gifHeight)
    {
        $this->gifHeight = $gifHeight;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param string $thumbnailUrl
     *
     * @return void
     */
    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;
    }

    /**
     * @deprecated Use getThumbnailUrl
     *
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->getThumbnailUrl();
    }

    /**
     * @deprecated Use setThumbnailUrl
     *
     * @param string $thumbUrl
     *
     * @return void
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->setThumbnailUrl($thumbUrl);
    }

    /**
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @return void
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }
}
