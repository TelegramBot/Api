<?php

namespace TelegramBot\Api\Types\InputMedia;

/**
 * Class InputMediaPhoto
 * Represents a photo to be sent.
 *
 * @package TelegramBot\Api
 */
class InputMediaPhoto extends InputMedia
{
    /**
     * @param string      $media
     * @param string|null $caption
     * @param string|null $parseMode
     */
    public function __construct(string $media, ?string $caption = null, ?string $parseMode = null)
    {
        $this->type = 'photo';
        $this->media = $media;
        $this->caption = $caption;
        $this->parseMode = $parseMode;
    }
}
