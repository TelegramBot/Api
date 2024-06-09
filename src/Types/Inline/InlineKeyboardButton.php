<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class InlineKeyboardButton
 * This object represents one button of an inline keyboard. Exactly one of the optional fields must be used to specify type of the button.
 *
 * @package TelegramBot\Api\Types
 */
class InlineKeyboardButton extends BaseType implements TypeInterface
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
        'url' => true,
        'callback_data' => true,
        'web_app' => WebAppInfo::class,
        'login_url' => LoginUrl::class,
        'switch_inline_query' => true,
        'switch_inline_query_current_chat' => true,
        'switch_inline_query_chosen_chat' => SwitchInlineQueryChosenChat::class,
        'callback_game' => CallbackGame::class,
        'pay' => true,
    ];

    /**
     * Label text on the button
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. HTTP or tg:// URL to be opened when the button is pressed
     *
     * @var string|null
     */
    protected $url;

    /**
     * Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     *
     * @var string|null
     */
    protected $callbackData;

    /**
     * Optional. Description of the Web App that will be launched when the user presses the button
     *
     * @var WebAppInfo|null
     */
    protected $webApp;

    /**
     * Optional. An HTTPS URL used to automatically authorize the user
     *
     * @var LoginUrl|null
     */
    protected $loginUrl;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field
     *
     * @var string|null
     */
    protected $switchInlineQuery;

    /**
     * Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field
     *
     * @var string|null
     */
    protected $switchInlineQueryCurrentChat;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
     *
     * @var SwitchInlineQueryChosenChat|null
     */
    protected $switchInlineQueryChosenChat;

    /**
     * Optional. Description of the game that will be launched when the user presses the button
     *
     * @var CallbackGame|null
     */
    protected $callbackGame;

    /**
     * Optional. Specify True to send a Pay button
     *
     * @var bool|null
     */
    protected $pay;

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
     * @return string|null
     */
    public function getCallbackData()
    {
        return $this->callbackData;
    }

    /**
     * @param string|null $callbackData
     * @return void
     */
    public function setCallbackData($callbackData)
    {
        $this->callbackData = $callbackData;
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

    /**
     * @return LoginUrl|null
     */
    public function getLoginUrl()
    {
        return $this->loginUrl;
    }

    /**
     * @param LoginUrl|null $loginUrl
     * @return void
     */
    public function setLoginUrl($loginUrl)
    {
        $this->loginUrl = $loginUrl;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery()
    {
        return $this->switchInlineQuery;
    }

    /**
     * @param string|null $switchInlineQuery
     * @return void
     */
    public function setSwitchInlineQuery($switchInlineQuery)
    {
        $this->switchInlineQuery = $switchInlineQuery;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat()
    {
        return $this->switchInlineQueryCurrentChat;
    }

    /**
     * @param string|null $switchInlineQueryCurrentChat
     * @return void
     */
    public function setSwitchInlineQueryCurrentChat($switchInlineQueryCurrentChat)
    {
        $this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;
    }

    /**
     * @return SwitchInlineQueryChosenChat|null
     */
    public function getSwitchInlineQueryChosenChat()
    {
        return $this->switchInlineQueryChosenChat;
    }

    /**
     * @param SwitchInlineQueryChosenChat|null $switchInlineQueryChosenChat
     * @return void
     */
    public function setSwitchInlineQueryChosenChat($switchInlineQueryChosenChat)
    {
        $this->switchInlineQueryChosenChat = $switchInlineQueryChosenChat;
    }

    /**
     * @return CallbackGame|null
     */
    public function getCallbackGame()
    {
        return $this->callbackGame;
    }

    /**
     * @param CallbackGame|null $callbackGame
     * @return void
     */
    public function setCallbackGame($callbackGame)
    {
        $this->callbackGame = $callbackGame;
    }

    /**
     * @return bool|null
     */
    public function isPay()
    {
        return $this->pay;
    }

    /**
     * @param bool|null $pay
     * @return void
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    }
}




