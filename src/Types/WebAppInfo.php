<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class WebAppInfo
 * Describes a Web App.
 *
 * @package TelegramBot\Api\Types
 */
class WebAppInfo extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'url' => true,
    ];

    /**
     * An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     *
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
