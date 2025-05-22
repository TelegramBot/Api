<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class MenuButtonWebApp
 * Represents a menu button launching a Web App.
 */
class MenuButtonWebApp extends MenuButton
{
    protected static $requiredParams = ['type', 'text', 'web_app'];

    protected static $map = [
        'type' => true,
        'text' => true,
        'web_app' => WebAppInfo::class
    ];

    protected $type = 'web_app';
    protected $text;
    protected $webApp;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getWebApp()
    {
        return $this->webApp;
    }

    public function setWebApp($webApp)
    {
        $this->webApp = $webApp;
    }
}
