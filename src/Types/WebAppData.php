<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class WebAppData extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['data', 'button_text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'data' => true,
        'button_text' => true,
    ];

    /**
     * The data. Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string
     */
    protected $data;

    /**
     * Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string
     */
    protected $buttonText;

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return void
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getButtonText()
    {
        return $this->buttonText;
    }

    /**
     * @param string $buttonText
     * @return void
     */
    public function setButtonText($buttonText)
    {
        $this->buttonText = $buttonText;
    }
}
