<?php

namespace tgbot\Api\Types;

/**
 * Class Audio
 * This object represents an audio file (voice note).
 *
 * @package tgbot\Api\Types
 */
class Audio
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Photo width
     *
     * @var int
     */
    protected $duration;

    /**
     * Optional. MIME type of the file as defined by sender
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
}