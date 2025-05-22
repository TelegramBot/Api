<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class StoryAreaTypeWeather
 * Describes a story area containing weather information.
 */
class StoryAreaTypeWeather extends StoryAreaType
{
    protected static $requiredParams = ['type', 'temperature', 'emoji', 'background_color'];

    protected static $map = [
        'type' => true,
        'temperature' => true,
        'emoji' => true,
        'background_color' => true
    ];

    protected $type = 'weather';
    protected $temperature;
    protected $emoji;
    protected $backgroundColor;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    public function getEmoji()
    {
        return $this->emoji;
    }

    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;
    }

    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }
}
