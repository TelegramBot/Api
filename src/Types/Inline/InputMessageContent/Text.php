<?php

namespace TelegramBot\Api\Types\Inline\InputMessageContent;

use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\ArrayOfMessageEntity;
use TelegramBot\Api\Types\Inline\InputMessageContent;
use TelegramBot\Api\Types\MessageEntity;

class Text extends InputMessageContent implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['message_text'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'message_text' => true,
        'parse_mode' => true,
        'entities' => ArrayOfMessageEntity::class,
        'disable_web_page_preview' => true,
    ];

    /**
     * Text of the message to be sent, 1-4096 characters
     *
     * @var string
     */
    protected string $messageText;

    /**
     * Optional. Send Markdown or HTML,
     * if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     *
     * @var string|null
     */
    protected ?string $parseMode;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
     * array of \TelegramBot\Api\Types\MessageEntity
     *
     * @var MessageEntity[]
     */
    protected ?array $entities;

    /**
     * Optional. Disables link previews for links in the sent message
     *
     * @var bool
     */
    protected bool $disableWebPagePreview;

    /**
     * @param string      $messageText
     * @param string|null $parseMode
     * @param array|null  $entities
     * @param false       $disableWebPagePreview
     */
    public function __construct(
        string $messageText,
        string $parseMode = null,
        ?array $entities = null,
        $disableWebPagePreview = false
    ) {
        $this->messageText           = $messageText;
        $this->parseMode             = $parseMode;
        $this->entities              = $entities;
        $this->disableWebPagePreview = $disableWebPagePreview;
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->messageText;
    }

    /**
     * @param string $messageText
     */
    public function setMessageText(string $messageText): void
    {
        $this->messageText = $messageText;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     */
    public function setParseMode(?string $parseMode): void
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return MessageEntity[]
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[] $entities
     */
    public function setEntities(?array $entities): void
    {
        $this->entities = $entities;
    }

    /**
     * @return bool
     */
    public function isDisableWebPagePreview(): bool
    {
        return $this->disableWebPagePreview;
    }

    /**
     * @param bool $disableWebPagePreview
     */
    public function setDisableWebPagePreview(bool $disableWebPagePreview): void
    {
        $this->disableWebPagePreview = $disableWebPagePreview;
    }
}
