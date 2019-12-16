<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\CallbackGame;
use TelegramBot\Api\Types\LoginUrl;

/**
 * Class InlineKeyboardButton
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 *
 * @package TelegramBot\Api\Types
 */
class InlineKeyboardButton extends BaseType implements \JsonSerializable
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'text' => true,
        'url' => true,
//        'login_url' => LoginUrl::class,
        'callback_data' => true,
        'switch_inline_query' => true,
        'switch_inline_query_current_chat' => true,
//        'callback_game' => CallbackGame::class,
        'pay' => true,
    ];

    /**
     * Text of the button. If none of the optional fields are used,
     * it will be sent as a message when the button is pressed
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. HTTP or tg:// url to be opened when button is pressed
     *
     * @var string|null
     */
    protected $url;

    /**
     * Optional. An HTTP URL used to automatically authorize the user.
     * Can be used as a replacement for the Telegram Login Widget (https://core.telegram.org/widgets/login).
     *
     * @var LoginUrl|null
     *
     * @TODO: implement
     */
    protected $loginUrl;

    /**
     * Optional. Data to be sent in a callback query (https://core.telegram.org/bots/api#callbackquery)
     * to the bot when button is pressed, 1-64 bytes
     *
     * @var string|null
     */
    protected $callbackData;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats,
     * open that chat and insert the bot‘s username and the specified inline query in the input field.
     * Can be empty, in which case just the bot’s username will be inserted.
     *
     * Note: This offers an easy way for users to start using your bot
     * in inline mode (https://core.telegram.org/bots/inline) when they are currently in a private chat with it.
     * Especially useful when combined with switch_pm… (https://core.telegram.org/bots/api#answerinlinequery) actions –
     * in this case the user will be automatically returned to the chat they switched from,
     * skipping the chat selection screen.
     *
     * @var string|null
     */
    protected $switchInlineQuery;

    /**
     * Optional. If set, pressing the button will insert the bot‘s username and the specified inline query
     * in the current chat's input field. Can be empty, in which case only the bot’s username will be inserted.
     *
     * This offers a quick way for the user to open your bot in inline mode in the same chat – good for selecting
     * something from multiple options.
     *
     * @var string|null
     */
    protected $switchInlineQueryCurrentChat;

    /**
     * Optional. Description of the game that will be launched when the user presses the button.
     *
     * NOTE: This type of button must always be the first button in the first row.
     *
     * @var CallbackGame|null
     *
     * @TODO: implement
     */
    protected $callbackGame;

    /**
     * Optional. Specify True, to send a Pay button (https://core.telegram.org/bots/api#payments).
     *
     * @var bool|null
     */
    protected $pay;

    /**
     * InlineKeyboardButton constructor.
     * @param string $text
     * @param string|null $url
     * @param LoginUrl|null $loginUrl
     * @param string|null $callbackData
     * @param string|null $switchInlineQuery
     * @param string|null $switchInlineQueryCurrentChat
     * @param CallbackGame|null $callbackGame
     * @param bool|null $pay
     */
    public function __construct(
        ?string $text = null,
        ?string $url = null,
        ?LoginUrl $loginUrl = null,
        ?string $callbackData = null,
        ?string $switchInlineQuery = null,
        ?string $switchInlineQueryCurrentChat = null,
        ?CallbackGame $callbackGame = null,
        ?bool $pay = null)
    {
        $this->text = $text;
        $this->url = $url;
        $this->loginUrl = $loginUrl;
        $this->callbackData = $callbackData;
        $this->switchInlineQuery = $switchInlineQuery;
        $this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;
        $this->callbackGame = $callbackGame;
        $this->pay = $pay;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return InlineKeyboardButton
     */
    public function setText(string $text): InlineKeyboardButton
    {
        $this->text = $text;

        return $this;
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
     * @return InlineKeyboardButton
     */
    public function setUrl(string $url): InlineKeyboardButton
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return LoginUrl|null
     */
    public function getLoginUrl(): ?LoginUrl
    {
        return $this->loginUrl;
    }

    /**
     * @param LoginUrl $loginUrl
     * @return InlineKeyboardButton
     */
    public function setLoginUrl(LoginUrl $loginUrl): InlineKeyboardButton
    {
        $this->loginUrl = $loginUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCallbackData(): ?string
    {
        return $this->callbackData;
    }

    /**
     * @param string $callbackData
     * @return InlineKeyboardButton
     */
    public function setCallbackData(string $callbackData): InlineKeyboardButton
    {
        $this->callbackData = $callbackData;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switchInlineQuery;
    }

    /**
     * @param string $switchInlineQuery
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQuery(string $switchInlineQuery): InlineKeyboardButton
    {
        $this->switchInlineQuery = $switchInlineQuery;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switchInlineQueryCurrentChat;
    }

    /**
     * @param string $switchInlineQueryCurrentChat
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryCurrentChat(string $switchInlineQueryCurrentChat): InlineKeyboardButton
    {
        $this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;

        return $this;
    }

    /**
     * @return CallbackGame|null
     */
    public function getCallbackGame(): ?CallbackGame
    {
        return $this->callbackGame;
    }

    /**
     * @param CallbackGame $callbackGame
     * @return InlineKeyboardButton
     */
    public function setCallbackGame(CallbackGame $callbackGame): InlineKeyboardButton
    {
        $this->callbackGame = $callbackGame;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPay(): ?bool
    {
        return $this->pay;
    }

    /**
     * @param bool $pay
     * @return InlineKeyboardButton
     */
    public function setPay(bool $pay): InlineKeyboardButton
    {
        $this->pay = $pay;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toJson(true);
    }
}
