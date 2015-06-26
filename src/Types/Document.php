<?php

namespace tgbot\Api\Types;

/**
 * Class Document
 * This object represents a general file (as opposed to photos and audio files).
 * Telegram users can send files of any type of up to 1.5 GB in size.
 *
 * @package tgbot\Api\Types
 */
class Document
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Document thumbnail as defined by sender
     *
     * @var \tgbot\Api\Types\PhotoSize
     */
    protected $thumb;

    /**
     * Optional. Original filename as defined by sender
     *
     * @var string
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var int
     */
    protected $mimeType;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;
}