<?php

namespace TelegramBot\Api\Types;

/**
 * Class BackgroundTypeChatTheme
 * The background is taken directly from a built-in chat theme.
 *
 * @package TelegramBot\Api\Types
 */
class BackgroundTypeChatTheme extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'theme_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'theme_name' => true,
    ];

    /**
     * Name of the chat theme, which is usually an emoji
     *
     * @var string
     */
    protected $themeName;

    /**
     * @return string
     */
    public function getThemeName()
    {
        return $this->themeName;
    }

    /**
     * @param string $themeName
     * @return void
     */
    public function setThemeName($themeName)
    {
        $this->themeName = $themeName;
    }
}
