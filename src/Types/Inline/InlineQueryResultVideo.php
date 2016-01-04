<?php

namespace TelegramBot\Api\Types\Inline;


/**
 * Class InlineQueryResultVideo
 * Represents link to a page containing an embedded video player or a video file.
 *
 * @package TelegramBot\Api\Types\Inline
 */
class InlineQueryResultVideo extends AbstractInlineQueryResult
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
        'description' => true
    ];

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
     * @var
     */
    protected $thumb_url;

    /**
     * Optional. Short description of the result
     *
     * @var
     */
    protected $description;

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
        return $this->thumb_url;
    }

    /**
     * @param mixed $thumb_url
     */
    public function setThumbUrl($thumb_url)
    {
        $this->thumb_url = $thumb_url;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
