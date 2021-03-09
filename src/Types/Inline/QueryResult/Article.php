<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

class Article extends AbstractInlineQueryResult
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['type', 'id', 'title', 'input_message_content'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'title' => true,
        'input_message_content' => InputMessageContent::class,
        'reply_markup' => InlineKeyboardMarkup::class,
        'url' => true,
        'hide_url' => true,
        'description' => true,
        'thumb_url' => true,
        'thumb_width' => true,
        'thumb_height' => true,
    ];

    /**
     * Type of the result, must be article
     *
     * @var string
     */
    protected string $type = 'article';

    /**
     * Optional. URL of the result
     *
     * @var string|null
     */
    protected ?string $url;

    /**
     * Optional. Pass True, if you don't want the URL to be shown in the message
     *
     * @var bool
     */
    protected bool $hideUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string|null
     */
    protected ?string $description;

    /**
     * Optional. Url of the thumbnail for the result
     *
     * @var string|null
     */
    protected ?string $thumbUrl;

    /**
     * Optional. Thumbnail width
     *
     * @var int|null
     */
    protected ?int $thumbWidth;

    /**
     * Optional. Thumbnail height
     *
     * @var int|null
     */
    protected ?int $thumbHeight;

    /**
     * @param string                    $id
     * @param string                    $title
     * @param InputMessageContent       $inputMessageContent
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param string|null               $url
     * @param bool                      $hideUrl
     * @param string|null               $description
     * @param string|null               $thumbUrl
     * @param int|null                  $thumbWidth
     * @param int|null                  $thumbHeight
     */
    public function __construct(
        string $id,
        string $title,
        InputMessageContent $inputMessageContent,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?string $url = null,
        bool $hideUrl = false,
        ?string $description = null,
        ?string $thumbUrl = null,
        ?int $thumbWidth = null,
        ?int $thumbHeight = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $replyMarkup);

        $this->url         = $url;
        $this->hideUrl     = $hideUrl;
        $this->description = $description;
        $this->thumbUrl    = $thumbUrl;
        $this->thumbWidth  = $thumbWidth;
        $this->thumbHeight = $thumbHeight;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool
     */
    public function isHideUrl(): bool
    {
        return $this->hideUrl;
    }

    /**
     * @param bool $hideUrl
     */
    public function setHideUrl(bool $hideUrl): void
    {
        $this->hideUrl = $hideUrl;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * @param string|null $thumbUrl
     */
    public function setThumbUrl(?string $thumbUrl): void
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * @return int|null
     */
    public function getThumbWidth(): ?int
    {
        return $this->thumbWidth;
    }

    /**
     * @param int|null $thumbWidth
     */
    public function setThumbWidth(?int $thumbWidth): void
    {
        $this->thumbWidth = $thumbWidth;
    }

    /**
     * @return int|null
     */
    public function getThumbHeight(): ?int
    {
        return $this->thumbHeight;
    }

    /**
     * @param int|null $thumbHeight
     */
    public function setThumbHeight(?int $thumbHeight): void
    {
        $this->thumbHeight = $thumbHeight;
    }
}
