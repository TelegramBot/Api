<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class LoginUrl extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['url'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'url' => true,
        'forward_text' => true,
        'bot_username' => true,
        'request_write_access' => true
    ];

    /**
     * An HTTP URL to be opened with user authorization data added to the query string when the button is pressed.
     *
     * @var string
     */
    protected string $url;

    /**
     * Optional. New text of the button in forwarded messages.
     *
     * @var string
     */
    protected string $forwardText;

    /**
     * Optional. Username of a bot, which will be used for user authorization
     *
     * @var string
     */
    protected string $botUsername;

    /**
     * Optional. Pass True to request the permission for your bot to send messages to the user.
     *
     * @var bool
     */
    protected bool $requestWriteAccess;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getForwardText(): string
    {
        return $this->forwardText;
    }

    /**
     * @param string $forwardText
     */
    public function setForwardText(string $forwardText): void
    {
        $this->forwardText = $forwardText;
    }

    /**
     * @return string
     */
    public function getBotUsername(): string
    {
        return $this->botUsername;
    }

    /**
     * @param string $botUsername
     */
    public function setBotUsername(string $botUsername): void
    {
        $this->botUsername = $botUsername;
    }

    /**
     * @return bool
     */
    public function isRequestWriteAccess(): bool
    {
        return $this->requestWriteAccess;
    }

    /**
     * @param bool $requestWriteAccess
     */
    public function setRequestWriteAccess(bool $requestWriteAccess): void
    {
        $this->requestWriteAccess = $requestWriteAccess;
    }
}
