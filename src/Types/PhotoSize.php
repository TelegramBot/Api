<?php

namespace tgbot\Api\Types;

/**
 * Class PhotoSize
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @package tgbot\Api\Types
 */
class PhotoSize
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
    protected $width;

    /**
     * Photo height
     *
     * @var int
     */
    protected $height;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;
}
