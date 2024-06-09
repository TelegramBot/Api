<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class BusinessIntro extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'title' => true,
        'message' => true,
        'sticker' => Sticker::class,
    ];

    /**
     * Optional. Title text of the business intro
     *
     * @var string|null
     */
    protected $title;

    /**
     * Optional. Message text of the business intro
     *
     * @var string|null
     */
    protected $message;

    /**
     * Optional. Sticker of the business intro
     *
     * @var Sticker|null
     */
    protected $sticker;

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     * @return void
     */
    public function setSticker($sticker)
    {
        $this->sticker = $sticker;
    }
}
