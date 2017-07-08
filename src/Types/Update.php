<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\ChosenInlineResult;
use TelegramBot\Api\Types\Inline\InlineQuery;
use TelegramBot\Api\Types\Payments\Query\PreCheckoutQuery;
use TelegramBot\Api\Types\Payments\Query\ShippingQuery;

/**
 * Class Update
 * This object represents an incoming update.
 * Only one of the optional parameters can be present in any given update.
 *
 * @package TelegramBot\Api\Types
 */
class Update extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['update_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'update_id' => true,
        'message' => Message::class,
        'edited_message' => Message::class,
        'channel_post' => Message::class,
        'edited_channel_post' => Message::class,
        'inline_query' => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query' => CallbackQuery::class,
        'shipping_query' => ShippingQuery::class,
        'pre_checkout_query' => PreCheckoutQuery::class,
    ];

    /**
     * The update‘s unique identifier.
     * Update identifiers start from a certain positive number and increase sequentially.
     * This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or
     * to restore the correct update sequence, should they get out of order.
     *
     * @var integer
     */
    protected $updateId;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var Message
     */
    protected $message;

    /**
     * Optional. New version of a message that is known to the bot and was edited
     *
     * @var Message
     */
    protected $editedMessage;

    /**
     * Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     *
     * @var Message
     */
    protected $channelPost;

    /**
     * Optional. New version of a channel post that is known to the bot and was edited
     *
     * @var Message
     */
    protected $editedChannelPost;

    /**
     * Optional. New incoming inline query
     *
     * @var \TelegramBot\Api\Types\Inline\InlineQuery
     */
    protected $inlineQuery;

    /**
     * Optional. The result of a inline query that was chosen by a user and sent to their chat partner
     *
     * @var \TelegramBot\Api\Types\Inline\ChosenInlineResult
     */
    protected $chosenInlineResult;

    /**
     * Optional. New incoming callback query
     *
     * @var \TelegramBot\Api\Types\CallbackQuery
     */
    protected $callbackQuery;

    /**
     * Optional. New incoming shipping query. Only for invoices with flexible price
     *
     * @var ShippingQuery
     */
    protected $shippingQuery;

    /**
     * Optional. New incoming pre-checkout query. Contains full information about checkout
     *
     * @var PreCheckoutQuery
     */
    protected $preCheckoutQuery;

    /**
     * @return int
     */
    public function getUpdateId()
    {
        return $this->updateId;
    }

    /**
     * @param int $updateId
     */
    public function setUpdateId($updateId)
    {
        $this->updateId = $updateId;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return Message
     */
    public function getEditedMessage()
    {
        return $this->editedMessage;
    }

    /**
     * @param Message $editedMessage
     */
    public function setEditedMessage($editedMessage)
    {
        $this->editedMessage = $editedMessage;
    }

    /**
     * @return Message
     */
    public function getChannelPost()
    {
        return $this->channelPost;
    }

    /**
     * @param Message $channelPost
     */
    public function setChannelPost($channelPost)
    {
        $this->channelPost = $channelPost;
    }

    /**
     * @return Message
     */
    public function getEditedChannelPost()
    {
        return $this->editedChannelPost;
    }

    /**
     * @param Message $editedChannelPost
     */
    public function setEditedChannelPost($editedChannelPost)
    {
        $this->editedChannelPost = $editedChannelPost;
    }

    /**
     * @return InlineQuery
     */
    public function getInlineQuery()
    {
        return $this->inlineQuery;
    }

    /**
     * @param InlineQuery $inlineQuery
     */
    public function setInlineQuery($inlineQuery)
    {
        $this->inlineQuery = $inlineQuery;
    }

    /**
     * @return ChosenInlineResult
     */
    public function getChosenInlineResult()
    {
        return $this->chosenInlineResult;
    }

    /**
     * @param ChosenInlineResult $chosenInlineResult
     */
    public function setChosenInlineResult($chosenInlineResult)
    {
        $this->chosenInlineResult = $chosenInlineResult;
    }

    /**
     * @return CallbackQuery
     */
    public function getCallbackQuery()
    {
        return $this->callbackQuery;
    }

    /**
     * @param CallbackQuery $callbackQuery
     */
    public function setCallbackQuery($callbackQuery)
    {
        $this->callbackQuery = $callbackQuery;
    }

    /**
     * @author MY
     * @return ShippingQuery
     */
    public function getShippingQuery()
    {
        return $this->shippingQuery;
    }

    /**
     * @author MY
     * @param ShippingQuery $shippingQuery
     */
    public function setShippingQuery($shippingQuery)
    {
        $this->shippingQuery = $shippingQuery;
    }

    /**
     * @author MY
     * @return PreCheckoutQuery
     */
    public function getPreCheckoutQuery()
    {
        return $this->preCheckoutQuery;
    }

    /**
     * @author MY
     * @param PreCheckoutQuery $preCheckoutQuery
     */
    public function setPreCheckoutQuery($preCheckoutQuery)
    {
        $this->preCheckoutQuery = $preCheckoutQuery;
    }
}
