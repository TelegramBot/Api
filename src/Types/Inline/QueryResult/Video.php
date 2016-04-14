<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

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
    static protected $requiredParams = ['type', 'id', 'video_url', 'mime_type', 'thumb_url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'type' => true,
        'id' => true,
        'video_url' => true,
        'mime_type' => true,
        'message_text' => true,
        'parse_mode' => true,
        'disable_web_page_preview' => true,
        'video_width' => true,
        'video_height' => true,
        'video_duration' => true,
        'thumb_url' => true,
        'title' => true,
        'description' => true,
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
     * @var int
     */
    protected $videoWidth;

    /**
     * Optional. Video height
     *
     * @var int
     */
    protected $videoHeight;

    /**
     * Optional. Video duration in seconds
     *
     * @var int
     */
    protected $videoDuration;

    /**
     * URL of the thumbnail (jpeg only) for the video
     *
     * @var string
     */
    protected $thumbUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string
     */
    protected $description;

    /**
     * InlineQueryResultVideo constructor.
     *
     * @param string $id
     * @param string $videoUrl
     * @param string $thumbUrl
     * @param string $mimeType
     * @param string|null $messageText
     * @param string|null $parseMode
     * @param bool|null $disableWebPagePreview
     * @param int|null $videoWidth
     * @param int|null $videoHeight
     * @param int|null $videoDuration
     * @param string|null $title
     * @param string|null $description
     */
    public function __construct(
        $id,
        $videoUrl,
        $thumbUrl,
        $mimeType,
        $messageText = null,
        $parseMode = null,
        $disableWebPagePreview = null,
        $videoWidth = null,
        $videoHeight = null,
        $videoDuration = null,
        $title = null,
        $description = null
    ) {
        parent::__construct($id, $title, $messageText, $parseMode, $disableWebPagePreview);
        
        $this->videoUrl = $videoUrl;
        $this->thumbUrl = $thumbUrl;
        $this->mimeType = $mimeType;
        $this->videoWidth = $videoWidth;
        $this->videoHeight = $videoHeight;
        $this->videoDuration = $videoDuration;
        $this->description = $description;
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
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int
     */
    public function getVideoWidth()
    {
        return $this->videoWidth;
    }

    /**
     * @param int $videoWidth
     */
    public function setVideoWidth($videoWidth)
    {
        $this->videoWidth = $videoWidth;
    }

    /**
     * @return int
     */
    public function getVideoHeight()
    {
        return $this->videoHeight;
    }

    /**
     * @param int $videoHeight
     */
    public function setVideoHeight($videoHeight)
    {
        $this->videoHeight = $videoHeight;
    }

    /**
     * @return int
     */
    public function getVideoDuration()
    {
        return $this->videoDuration;
    }

    /**
     * @param int $videoDuration
     */
    public function setVideoDuration($videoDuration)
    {
        $this->videoDuration = $videoDuration;
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
}
