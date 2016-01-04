<?php

namespace TelegramBot\Api\Types\Inline;

/**
 * Class InlineQueryResultArticle
 * Represents a link to an article or web page.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class InlineQueryResultArticle extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['type', 'id', 'title', 'message_text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'type' => true,
        'id' => true,
        'title' => true,
        'message_text' => true,
        'parse_mode' => true,
        'disable_web_page_preview' => true,
        'url' => true,
        'hide_url' => true,
        'description' => true,
        'thumb_url' => true,
        'thumb_width' => true,
        'thumb_height' => true
    ];

    /**
     * Optional. URL of the result
     *
     * @var string
     */
    protected $url;

    /**
     * Optional. Pass True, if you don't want the URL to be shown in the message
     *
     * @var bool
     */
    protected $hideUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string
     */
    protected $description;

    /**
     * Optional. Url of the thumbnail for the result
     *
     * @var string
     */
    protected $thumbUrl;

    /**
     * Optional. Thumbnail width
     *
     * @var int
     */
    protected $thumbWidth;

    /**
     * Optional. Thumbnail height
     *
     * @var int
     */
    protected $thumbHeight;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return boolean
     */
    public function isHideUrl()
    {
        return $this->hideUrl;
    }

    /**
     * @param boolean $hideUrl
     */
    public function setHideUrl($hideUrl)
    {
        $this->hideUrl = $hideUrl;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * @param string $thumbUrl
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * @return int
     */
    public function getThumbWidth()
    {
        return $this->thumbWidth;
    }

    /**
     * @param int $thumbWidth
     */
    public function setThumbWidth($thumbWidth)
    {
        $this->thumbWidth = $thumbWidth;
    }

    /**
     * @return int
     */
    public function getThumbHeight()
    {
        return $this->thumbHeight;
    }

    /**
     * @param int $thumbHeight
     */
    public function setThumbHeight($thumbHeight)
    {
        $this->thumbHeight = $thumbHeight;
    }
}
