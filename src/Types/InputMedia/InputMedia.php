<?php

namespace TelegramBot\Api\Types\InputMedia;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Collection\CollectionItemInterface;
use TelegramBot\Api\Types\File;

/**
 * Class InputMedia
 * This object represents the content of a media message to be sent.
 *
 * @package TelegramBot\Api
 */
class InputMedia extends BaseType implements CollectionItemInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'media'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'media' => true,
        'caption' => true,
        'parse_mode' => true,
        'thumb' => File::class,
    ];

    /**
     * Type of the result.
     *
     * @var string
     */
    protected $type;

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>"
     * to upload a new one using multipart/form-data under <file_attach_name> name.
     *
     * @var string
     */
    protected $media;

    /**
     * Optional. Caption of the photo to be sent, 0-200 characters.
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     */
    protected $parseMode;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in the media caption.
     *
     * @var File
     */
    protected $thumb;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param string $media
     *
     * @return void
     */
    public function setMedia($media)
    {
        $this->media = $media;
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
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     *
     * @return void
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }
}
