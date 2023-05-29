<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultArticle
 * Represents a link to an article or web page.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class Article extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'id', 'title', 'input_message_content'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'id' => true,
        'title' => true,
        'input_message_content' => InputMessageContent::class,
        'reply_markup' => InlineKeyboardMarkup::class,
        'url' => true,
        'hide_url' => true,
        'description' => true,
        'thumbnail_url' => true,
        'thumbnail_width' => true,
        'thumbnail_height' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $type = 'article';

    /**
     * Optional. URL of the result
     *
     * @var string|null
     */
    protected $url;

    /**
     * Optional. Pass True, if you don't want the URL to be shown in the message
     *
     * @var bool|null
     */
    protected $hideUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string|null
     */
    protected $description;

    /**
     * Optional. Url of the thumbnail for the result
     *
     * @var string|null
     */
    protected $thumbnailUrl;

    /**
     * Optional. Thumbnail width
     *
     * @var int|null
     */
    protected $thumbnailWidth;

    /**
     * Optional. Thumbnail height
     *
     * @var int|null
     */
    protected $thumbnailHeight;

    /**
     * InlineQueryResultArticle constructor.
     *
     * @param string $id
     * @param string $title
     * @param string|null $description
     * @param string|null $thumbnailUrl
     * @param int|null $thumbnailWidth
     * @param int|null $thumbnailHeight
     * @param InputMessageContent $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        $id,
        $title,
        $description = null,
        $thumbnailUrl = null,
        $thumbnailWidth = null,
        $thumbnailHeight = null,
        $inputMessageContent = null,
        $inlineKeyboardMarkup = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->description = $description;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->thumbnailWidth = $thumbnailWidth;
        $this->thumbnailHeight = $thumbnailHeight;
    }

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     *
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return bool|null
     */
    public function isHideUrl()
    {
        return $this->hideUrl;
    }

    /**
     * @param bool|null $hideUrl
     *
     * @return void
     */
    public function setHideUrl($hideUrl)
    {
        $this->hideUrl = $hideUrl;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param string|null $thumbnailUrl
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
     * @return string|null
     */
    public function getThumbUrl()
    {
        return $this->getThumbnailUrl();
    }

    /**
     * @deprecated Use setThumbnailUrl
     *
     * @param string|null $thumbUrl
     *
     * @return void
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->setThumbnailUrl($thumbUrl);
    }

    /**
     * @return int|null
     */
    public function getThumbnailWidth()
    {
        return $this->thumbnailWidth;
    }

    /**
     * @param int|null $thumbnailWidth
     *
     * @return void
     */
    public function setThumbnailWidth($thumbnailWidth)
    {
        $this->thumbnailWidth = $thumbnailWidth;
    }

    /**
     * @deprecated Use getThumbnailWidth
     *
     * @return int|null
     */
    public function getThumbWidth()
    {
        return $this->getThumbnailWidth();
    }

    /**
     * @deprecated Use setThumbnailWidth
     *
     * @param int|null $thumbWidth
     *
     * @return void
     */
    public function setThumbWidth($thumbWidth)
    {
        $this->setThumbnailWidth($thumbWidth);
    }

    /**
     * @return int|null
     */
    public function getThumbnailHeight()
    {
        return $this->thumbnailHeight;
    }

    /**
     * @param int|null $thumbnailHeight
     *
     * @return void
     */
    public function setThumbnailHeight($thumbnailHeight)
    {
        $this->thumbnailHeight = $thumbnailHeight;
    }

    /**
     * @deprecated Use getThumbnailHeight
     *
     * @return int|null
     */
    public function getThumbHeight()
    {
        return $this->getThumbnailHeight();
    }

    /**
     * @deprecated Use setThumbnailWidth
     *
     * @param int|null $thumbHeight
     *
     * @return void
     */
    public function setThumbHeight($thumbHeight)
    {
        $this->setThumbnailHeight($thumbHeight);
    }
}
