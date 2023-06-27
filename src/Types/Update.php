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
    protected static $requiredParams = ['update_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
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
        'poll_answer' => PollAnswer::class,
        'poll' => Poll::class,
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
     * @var Message|null
     */
    protected $message;

    /**
     * Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
     *
     * @var PollAnswer|null
     */
    protected $pollAnswer;

    /**
     * Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
     *
     * @var Poll|null
     */
    protected $poll;

    /**
     * Optional. New version of a message that is known to the bot and was edited
     *
     * @var Message|null
     */
    protected $editedMessage;

    /**
     * Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     *
     * @var Message|null
     */
    protected $channelPost;

    /**
     * Optional. New version of a channel post that is known to the bot and was edited
     *
     * @var Message|null
     */
    protected $editedChannelPost;

    /**
     * Optional. New incoming inline query
     *
     * @var \TelegramBot\Api\Types\Inline\InlineQuery|null
     */
    protected $inlineQuery;

    /**
     * Optional. The result of a inline query that was chosen by a user and sent to their chat partner
     *
     * @var \TelegramBot\Api\Types\Inline\ChosenInlineResult|null
     */
    protected $chosenInlineResult;

    /**
     * Optional. New incoming callback query
     *
     * @var \TelegramBot\Api\Types\CallbackQuery|null
     */
    protected $callbackQuery;

    /**
     * Optional. New incoming shipping query. Only for invoices with flexible price
     *
     * @var ShippingQuery|null
     */
    protected $shippingQuery;

    /**
     * Optional. New incoming pre-checkout query. Contains full information about checkout
     *
     * @var PreCheckoutQuery|null
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
     *
     * @return void
     */
    public function setUpdateId($updateId)
    {
        $this->updateId = $updateId;
    }

    /**
     * @return Message|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     *
     * @return void
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return Message|null
     */
    public function getEditedMessage()
    {
        return $this->editedMessage;
    }

    /**
     * @param Message $editedMessage
     *
     * @return void
     */
    public function setEditedMessage($editedMessage)
    {
        $this->editedMessage = $editedMessage;
    }

    /**
     * @return Message|null
     */
    public function getChannelPost()
    {
        return $this->channelPost;
    }

    /**
     * @param Message $channelPost
     *
     * @return void
     */
    public function setChannelPost($channelPost)
    {
        $this->channelPost = $channelPost;
    }

    /**
     * @return PollAnswer|null
     */
    public function getPollAnswer()
    {
        return $this->pollAnswer;
    }

    /**
     * @return Poll|null
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     *
     * @return void
     */
    public function setPoll($poll)
    {
        $this->poll = $poll;
    }

    /**
     * @param PollAnswer $pollAnswer
     *
     * @return void
     */
    public function setPollAnswer($pollAnswer)
    {
        $this->pollAnswer = $pollAnswer;
    }

    /**
     * @return Message|null
     */
    public function getEditedChannelPost()
    {
        return $this->editedChannelPost;
    }

    /**
     * @param Message $editedChannelPost
     *
     * @return void
     */
    public function setEditedChannelPost($editedChannelPost)
    {
        $this->editedChannelPost = $editedChannelPost;
    }

    /**
     * @return InlineQuery|null
     */
    public function getInlineQuery()
    {
        return $this->inlineQuery;
    }

    /**
     * @param InlineQuery $inlineQuery
     *
     * @return void
     */
    public function setInlineQuery($inlineQuery)
    {
        $this->inlineQuery = $inlineQuery;
    }

    /**
     * @return ChosenInlineResult|null
     */
    public function getChosenInlineResult()
    {
        return $this->chosenInlineResult;
    }

    /**
     * @param ChosenInlineResult $chosenInlineResult
     *
     * @return void
     */
    public function setChosenInlineResult($chosenInlineResult)
    {
        $this->chosenInlineResult = $chosenInlineResult;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery()
    {
        return $this->callbackQuery;
    }

    /**
     * @param CallbackQuery $callbackQuery
     *
     * @return void
     */
    public function setCallbackQuery($callbackQuery)
    {
        $this->callbackQuery = $callbackQuery;
    }

    /**
     * @author MY
     *
     * @return ShippingQuery|null
     */
    public function getShippingQuery()
    {
        return $this->shippingQuery;
    }

    /**
     * @author MY
     *
     * @param ShippingQuery $shippingQuery
     *
     * @return void
     */
    public function setShippingQuery($shippingQuery)
    {
        $this->shippingQuery = $shippingQuery;
    }

    /**
     * @author MY
     *
     * @return PreCheckoutQuery|null
     */
    public function getPreCheckoutQuery()
    {
        return $this->preCheckoutQuery;
    }

    /**
     * @author MY
     *
     * @param PreCheckoutQuery $preCheckoutQuery
     *
     * @return void
     */
    public function setPreCheckoutQuery($preCheckoutQuery)
    {
        $this->preCheckoutQuery = $preCheckoutQuery;
    }
}
