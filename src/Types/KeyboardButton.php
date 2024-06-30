<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class KeyboardButton
 * This object represents one button of the reply keyboard.
 *
 * @package TelegramBot\Api\Types
 */
class KeyboardButton extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'text' => true,
        'request_users' => KeyboardButtonRequestUsers::class,
        'request_chat' => KeyboardButtonRequestChat::class,
        'request_contact' => true,
        'request_location' => true,
        'request_poll' => KeyboardButtonPollType::class,
        'web_app' => WebAppInfo::class,
    ];

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. If specified, pressing the button will open a list of suitable users.
     * Identifiers of selected users will be sent to the bot in a “users_shared” service message.
     * Available in private chats only.
     *
     * @var KeyboardButtonRequestUsers|null
     */
    protected $requestUsers;

    /**
     * Optional. If specified, pressing the button will open a list of suitable chats.
     * Tapping on a chat will send its identifier to the bot in a “chat_shared” service message.
     * Available in private chats only.
     *
     * @var KeyboardButtonRequestChat|null
     */
    protected $requestChat;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only.
     *
     * @var bool|null
     */
    protected $requestContact;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only.
     *
     * @var bool|null
     */
    protected $requestLocation;

    /**
     * Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed.
     * Available in private chats only.
     *
     * @var KeyboardButtonPollType|null
     */
    protected $requestPoll;

    /**
     * Optional. If specified, the described Web App will be launched when the button is pressed.
     * The Web App will be able to send a “web_app_data” service message. Available in private chats only.
     *
     * @var WebAppInfo|null
     */
    protected $webApp;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return KeyboardButtonRequestUsers|null
     */
    public function getRequestUsers()
    {
        return $this->requestUsers;
    }

    /**
     * @param KeyboardButtonRequestUsers|null $requestUsers
     * @return void
     */
    public function setRequestUsers($requestUsers)
    {
        $this->requestUsers = $requestUsers;
    }

    /**
     * @return KeyboardButtonRequestChat|null
     */
    public function getRequestChat()
    {
        return $this->requestChat;
    }

    /**
     * @param KeyboardButtonRequestChat|null $requestChat
     * @return void
     */
    public function setRequestChat($requestChat)
    {
        $this->requestChat = $requestChat;
    }

    /**
     * @return bool|null
     */
    public function getRequestContact()
    {
        return $this->requestContact;
    }

    /**
     * @param bool|null $requestContact
     * @return void
     */
    public function setRequestContact($requestContact)
    {
        $this->requestContact = $requestContact;
    }

    /**
     * @return bool|null
     */
    public function getRequestLocation()
    {
        return $this->requestLocation;
    }

    /**
     * @param bool|null $requestLocation
     * @return void
     */
    public function setRequestLocation($requestLocation)
    {
        $this->requestLocation = $requestLocation;
    }

    /**
     * @return KeyboardButtonPollType|null
     */
    public function getRequestPoll()
    {
        return $this->requestPoll;
    }

    /**
     * @param KeyboardButtonPollType|null $requestPoll
     * @return void
     */
    public function setRequestPoll($requestPoll)
    {
        $this->requestPoll = $requestPoll;
    }

    /**
     * @return WebAppInfo|null
     */
    public function getWebApp()
    {
        return $this->webApp;
    }

    /**
     * @param WebAppInfo|null $webApp
     * @return void
     */
    public function setWebApp($webApp)
    {
        $this->webApp = $webApp;
    }
}
