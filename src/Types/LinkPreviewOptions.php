<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class LinkPreviewOptions
 * Describes the options used for link preview generation.
 *
 * @package TelegramBot\Api\Types
 */
class LinkPreviewOptions extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'is_disabled' => true,
        'url' => true,
        'prefer_small_media' => true,
        'prefer_large_media' => true,
        'show_above_text' => true,
    ];

    /**
     * Optional. True, if the link preview is disabled
     *
     * @var bool|null
     */
    protected $isDisabled;

    /**
     * Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
     *
     * @var string|null
     */
    protected $url;

    /**
     * Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     *
     * @var bool|null
     */
    protected $preferSmallMedia;

    /**
     * Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     *
     * @var bool|null
     */
    protected $preferLargeMedia;

    /**
     * Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown below the message text
     *
     * @var bool|null
     */
    protected $showAboveText;

    /**
     * @return bool|null
     */
    public function getIsDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * @param bool|null $isDisabled
     * @return void
     */
    public function setIsDisabled($isDisabled)
    {
        $this->isDisabled = $isDisabled;
    }

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return bool|null
     */
    public function getPreferSmallMedia()
    {
        return $this->preferSmallMedia;
    }

    /**
     * @param bool|null $preferSmallMedia
     * @return void
     */
    public function setPreferSmallMedia($preferSmallMedia)
    {
        $this->preferSmallMedia = $preferSmallMedia;
    }

    /**
     * @return bool|null
     */
    public function getPreferLargeMedia()
    {
        return $this->preferLargeMedia;
    }

    /**
     * @param bool|null $preferLargeMedia
     * @return void
     */
    public function setPreferLargeMedia($preferLargeMedia)
    {
        $this->preferLargeMedia = $preferLargeMedia;
    }

    /**
     * @return bool|null
     */
    public function getShowAboveText()
    {
        return $this->showAboveText;
    }

    /**
     * @param bool|null $showAboveText
     * @return void
     */
    public function setShowAboveText($showAboveText)
    {
        $this->showAboveText = $showAboveText;
    }
}
