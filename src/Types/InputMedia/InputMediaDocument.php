<?php

namespace TelegramBot\Api\Types\InputMedia;

use TelegramBot\Api\Types\File;

/**
 * Class InputMediaDocument
 * Represents a photo to be sent.
 *
 * @package TelegramBot\Api
 */
class InputMediaDocument extends InputMedia
{
    /**
     * InputMediaPhoto constructor.
     *
     * @param string $media
     * @param string|null $caption
     * @param string|null $parseMode
     * @param File|null $thumb
     */
    public function __construct($media, $caption = null, $parseMode = null, File $thumb = null)
    {
        $this->type = 'document';
        $this->media = $media;
        $this->caption = $caption;
        $this->parseMode = $parseMode;
        $this->trumb = $thumb;
    }
}
