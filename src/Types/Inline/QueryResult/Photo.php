<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultPhoto
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption.
 * Alternatively, you can provide message_text to send it instead of photo.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class Photo extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'id', 'photo_url', 'thumbnail_url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'id' => true,
        'photo_url' => true,
        'thumbnail_url' => true,
        'photo_width' => true,
        'photo_height' => true,
        'title' => true,
        'description' => true,
        'caption' => true,
        'input_message_content' => InputMessageContent::class,
        'reply_markup' => InlineKeyboardMarkup::class,
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
     * Optional. Width of the photo
     *
     * @var int|null
     */
    protected $photoWidth;

    /**
     * Optional. Height of the photo
     *
     * @var int|null
     */
    protected $photoHeight;

    /**
     * URL of the thumbnail for the photo
     *
     * @var string
     */
    protected $thumbnailUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string|null
     */
    protected $description;

    /**
     * Optional. Caption of the photo to be sent, 0-200 characters
     *
     * @var string|null
     */
    protected $caption;

    /**
     * InlineQueryResultPhoto constructor.
     *
     * @param string $id
     * @param string $photoUrl
     * @param string $thumbnailUrl
     * @param int|null $photoWidth
     * @param int|null $photoHeight
     * @param string|null $title
     * @param string|null $description
     * @param string|null $caption
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        $id,
        $photoUrl,
        $thumbnailUrl,
        $photoWidth = null,
        $photoHeight = null,
        $title = null,
        $description = null,
        $caption = null,
        $inputMessageContent = null,
        $inlineKeyboardMarkup = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->photoUrl = $photoUrl;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->photoWidth = $photoWidth;
        $this->photoHeight = $photoHeight;
        $this->description = $description;
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param string $photoUrl
     *
     * @return void
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return int|null
     */
    public function getPhotoWidth()
    {
        return $this->photoWidth;
    }

    /**
     * @param int|null $photoWidth
     *
     * @return void
     */
    public function setPhotoWidth($photoWidth)
    {
        $this->photoWidth = $photoWidth;
    }

    /**
     * @return int|null
     */
    public function getPhotoHeight()
    {
        return $this->photoHeight;
    }

    /**
     * @param int|null $photoHeight
     *
     * @return void
     */
    public function setPhotoHeight($photoHeight)
    {
        $this->photoHeight = $photoHeight;
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
