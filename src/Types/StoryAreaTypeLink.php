<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class StoryAreaTypeLink
 * Describes a story area pointing to a link.
 */
class StoryAreaTypeLink extends StoryAreaType
{
    protected static $requiredParams = ['type', 'url'];

    protected static $map = [
        'type' => true,
        'url' => true
    ];

    protected $type = 'link';
    protected $url;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
}
