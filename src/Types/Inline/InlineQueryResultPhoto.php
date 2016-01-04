<?php

namespace TelegramBot\Api\Types\Inline;

/**
 * Class InlineQueryResultPhoto
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption.
 * Alternatively, you can provide message_text to send it instead of photo.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class InlineQueryResultPhoto extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['type', 'id', 'photo_url', 'thumb_url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'type' => true,
        'id' => true,
        'photo_url' => true,
        'mime_type' => true,
        'photo_width' => true,
        'photo_height' => true,
        'thumb_url' => true,
        'title' => true,
        'description' => true,
        'caption' => true,
        'message_text' => true,
        'parse_mode' => true,
        'disable_web_page_preview' => true
    ];

    /**
     * A valid URL of the photo. Photo size must not exceed 5MB
     *
     * @var string
     */
    protected $photoUrl;

    /**
     * Optional. MIME type of the photo, defaults to image/jpeg
     *
     * @var string
     */
    protected $mimeType;

    /**
     * Optional. Width of the photo
     *
     * @var int
     */
    protected $photoWidth;

    /**
     * Optional. Height of the photo
     *
     * @var int
     */
    protected $photoHeight;

    /**
     * URL of the thumbnail for the photo
     *
     * @var
     */
    protected $thumbUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string
     */
    protected $description;

    /**
     * Optional. Caption of the photo to be sent, 0-200 characters
     *
     * @var string
     */
    protected $caption;

    /**
     * Optional. Text of a message to be sent instead of the photo, 1-512 characters
     *
     * @var string
     */
    protected $messageText;

    /**
     * Optional. Send “Markdown”, if you want Telegram apps to show bold, italic and inline URLs in your bot's message.
     *
     * @var string
     */
    protected $parseMode;

    /**
     * Optional. Disables link previews for links in the sent message
     *
     * @var bool
     */
    protected $disableWebPagePreview;

    /**
     * @return string
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param string $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int
     */
    public function getPhotoWidth()
    {
        return $this->photoWidth;
    }

    /**
     * @param int $photoWidth
     */
    public function setPhotoWidth($photoWidth)
    {
        $this->photoWidth = $photoWidth;
    }

    /**
     * @return int
     */
    public function getPhotoHeight()
    {
        return $this->photoHeight;
    }

    /**
     * @param int $photoHeight
     */
    public function setPhotoHeight($photoHeight)
    {
        $this->photoHeight = $photoHeight;
    }

    /**
     * @return mixed
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * @param mixed $thumbUrl
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
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
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getMessageText()
    {
        return $this->messageText;
    }

    /**
     * @param string $messageText
     */
    public function setMessageText($messageText)
    {
        $this->messageText = $messageText;
    }

    /**
     * @return string
     */
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * @param string $parseMode
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return boolean
     */
    public function isDisableWebPagePreview()
    {
        return $this->disableWebPagePreview;
    }

    /**
     * @param boolean $disableWebPagePreview
     */
    public function setDisableWebPagePreview($disableWebPagePreview)
    {
        $this->disableWebPagePreview = $disableWebPagePreview;
    }
}
