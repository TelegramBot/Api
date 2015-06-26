<?php

namespace tgbot\Api\Types;

/**
 * Class Video
 * This object represents a video file.
 *
 * @package tgbot\Api\Types
 */
class Video
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Video width as defined by sender
     *
     * @var int
     */
    protected $width;

    /**
     * Video height as defined by sender
     *
     * @var int
     */
    protected $height;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int
     */
    protected $duration;

    /**
     * Video thumbnail
     *
     * @var \tgbot\Api\Types\PhotoSize
     */
    protected $thumb;


    /**
     * Optional. Mime type of a file as defined by sender
     *
     * @var string
     */
    protected $mimeType;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;

    /**
     * Optional. Text description of the video (usually empty)
     *
     * @var string
     */
    protected $caption;
}