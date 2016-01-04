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
     * {@inheritdoc}
     *
     * @var string
     */
    protected $type = 'photo';

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
}
