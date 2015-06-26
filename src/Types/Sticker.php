<?php

namespace tgbot\Api\Types;

/**
 * Class Sticker
 * This object represents a sticker.
 *
 * @package tgbot\Api\Types
 */
class Sticker
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Sticker width
     *
     * @var int
     */
    protected $width;

    /**
     * Sticker height
     *
     * @var int
     */
    protected $height;

    /**
     * Document thumbnail as defined by sender
     *
     * @var \tgbot\Api\Types\PhotoSize
     */
    protected $thumb;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;
}