<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultVideo
 * Represents link to a page containing an embedded video player or a video file.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class Video extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'id', 'video_url', 'mime_type', 'thumbnail_url', 'title'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'id' => true,
        'video_url' => true,
        'mime_type' => true,
        'thumbnail_url' => true,
        'title' => true,
        'caption' => true,
        'description' => true,
        'video_width' => true,
        'video_height' => true,
        'video_duration' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $type = 'video';

    /**
     * A valid URL for the embedded video player or video file
     *
     * @var string
     */
    protected $videoUrl;

    /**
     * Mime type of the content of video url, “text/html” or “video/mp4”
     *
     * @var string
     */
    protected $mimeType;

    /**
     * Optional. Video width
     *
     * @var int|null
     */
    protected $videoWidth;

    /**
     * Optional. Video height
     *
     * @var int|null
     */
    protected $videoHeight;

    /**
     * Optional. Video duration in seconds
     *
     * @var int|null
     */
    protected $videoDuration;

    /**
     * URL of the thumbnail (jpeg only) for the video
     *
     * @var string
     */
    protected $thumbnailUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Optional. Short description of the result
     *
     * @var string|null
     */
    protected $description;

    /**
     * Video constructor
     *
     * @param string $id
     * @param string $videoUrl
     * @param string $thumbnailUrl
     * @param string $mimeType
     * @param string $title
     * @param string|null $caption
     * @param string|null $description
     * @param int|null $videoWidth
     * @param int|null $videoHeight
     * @param int|null $videoDuration
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        $id,
        $videoUrl,
        $thumbnailUrl,
        $mimeType,
        $title,
        $caption = null,
        $description = null,
        $videoWidth = null,
        $videoHeight = null,
        $videoDuration = null,
        $inputMessageContent = null,
        $inlineKeyboardMarkup = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->videoUrl = $videoUrl;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->caption = $caption;
        $this->description = $description;
        $this->mimeType = $mimeType;
        $this->videoWidth = $videoWidth;
        $this->videoHeight = $videoHeight;
        $this->videoDuration = $videoDuration;
    }

    /**
     * @return string
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * @param string $videoUrl
     *
     * @return void
     */
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;
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
     *
     * @return void
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int|null
     */
    public function getVideoWidth()
    {
        return $this->videoWidth;
    }

    /**
     * @param int|null $videoWidth
     *
     * @return void
     */
    public function setVideoWidth($videoWidth)
    {
        $this->videoWidth = $videoWidth;
    }

    /**
     * @return int|null
     */
    public function getVideoHeight()
    {
        return $this->videoHeight;
    }

    /**
     * @param int|null $videoHeight
     *
     * @return void
     */
    public function setVideoHeight($videoHeight)
    {
        $this->videoHeight = $videoHeight;
    }

    /**
     * @return int|null
     */
    public function getVideoDuration()
    {
        return $this->videoDuration;
    }

    /**
     * @param int|null $videoDuration
     *
     * @return void
     */
    public function setVideoDuration($videoDuration)
    {
        $this->videoDuration = $videoDuration;
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
}
