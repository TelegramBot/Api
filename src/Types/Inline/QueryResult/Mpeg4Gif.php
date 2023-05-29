<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultMpeg4Gif
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound).
 * By default, this animated MPEG-4 file will be sent by the user with optional caption.
 * Alternatively, you can provide message_text to send it instead of the animation.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class Mpeg4Gif extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'id', 'mpeg4_url', 'thumbnail_url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'id' => true,
        'mpeg4_url' => true,
        'mpeg4_width' => true,
        'mpeg4_height' => true,
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
    protected $type = 'mpeg4_gif';

    /**
     * A valid URL for the MP4 file. File size must not exceed 1MB
     *
     * @var string
     */
    protected $mpeg4Url;

    /**
     * Optional. Video width
     *
     * @var int|null
     */
    protected $mpeg4Width;

    /**
     * Optional. Video height
     *
     * @var int|null
     */
    protected $mpeg4Height;

    /**
     * URL of the static thumbnail (jpeg or gif) for the result
     *
     * @var string
     */
    protected $thumbnailUrl;

    /**
     * Optional. Caption of the MPEG-4 file to be sent, 0-200 characters
     *
     * @var string|null
     */
    protected $caption;

    /**
     * InlineQueryResultMpeg4Gif constructor.
     *
     * @param string $id
     * @param string $mpeg4Url
     * @param string $thumbnailUrl
     * @param int|null $mpeg4Width
     * @param int|null $mpeg4Height
     * @param string|null $caption
     * @param string|null $title
     * @param InputMessageContent $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        $id,
        $mpeg4Url,
        $thumbnailUrl,
        $title = null,
        $caption = null,
        $mpeg4Width = null,
        $mpeg4Height = null,
        $inputMessageContent = null,
        $inlineKeyboardMarkup = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->mpeg4Url = $mpeg4Url;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->mpeg4Width = $mpeg4Width;
        $this->mpeg4Height = $mpeg4Height;
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getMpeg4Url()
    {
        return $this->mpeg4Url;
    }

    /**
     * @param string $mpeg4Url
     *
     * @return void
     */
    public function setMpeg4Url($mpeg4Url)
    {
        $this->mpeg4Url = $mpeg4Url;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Width()
    {
        return $this->mpeg4Width;
    }

    /**
     * @param int|null $mpeg4Width
     *
     * @return void
     */
    public function setMpeg4Width($mpeg4Width)
    {
        $this->mpeg4Width = $mpeg4Width;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Height()
    {
        return $this->mpeg4Height;
    }

    /**
     * @param int|null $mpeg4Height
     *
     * @return void
     */
    public function setMpeg4Height($mpeg4Height)
    {
        $this->mpeg4Height = $mpeg4Height;
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
