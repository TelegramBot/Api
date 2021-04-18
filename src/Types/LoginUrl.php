<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user.
 * Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram.
 */
class LoginUrl extends BaseType implements TypeInterface
{
    /**
     * @var array
     */
    static protected $requiredParams = ['url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
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
    protected $url;

    /**
     * Optional. New text of the button in forwarded messages.
     *
     * @var string
     */
    protected $forwardText;

    /**
     * Optional. Username of a bot, which will be used for user authorization
     *
     * @var string
     */
    protected $botUsername;

    /**
     * Optional. Pass True to request the permission for your bot to send messages to the user.
     *
     * @var bool
     */
    protected $requestWriteAccess;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getForwardText()
    {
        return $this->forwardText;
    }

    /**
     * @param string $forwardText
     */
    public function setForwardText($forwardText)
    {
        $this->forwardText = $forwardText;
    }

    /**
     * @return string
     */
    public function getBotUsername()
    {
        return $this->botUsername;
    }

    /**
     * @param string $botUsername
     */
    public function setBotUsername($botUsername)
    {
        $this->botUsername = $botUsername;
    }

    /**
     * @return bool
     */
    public function isRequestWriteAccess()
    {
        return $this->requestWriteAccess;
    }

    /**
     * @param bool $requestWriteAccess
     */
    public function setRequestWriteAccess($requestWriteAccess)
    {
        $this->requestWriteAccess = $requestWriteAccess;
    }
}
