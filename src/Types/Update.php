<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\ChosenInlineResult;
use TelegramBot\Api\Types\Inline\InlineQuery;
use TelegramBot\Api\Types\Payments\Query\PreCheckoutQuery;
use TelegramBot\Api\Types\Payments\Query\ShippingQuery;

class Update extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['update_id'];

    /**
     * @var array
     */
    protected static array $map = [
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
     * The update's unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This ID becomes especially handy if you're using Webhooks, since it allows you to ignore repeated
     * updates or to restore the correct update sequence, should they get out of order. If there are no new updates for
     * at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
     *
     * @var int
     */
    protected int $updateId;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var Message
     */
    protected Message $message;

    /**
     * Optional. New version of a message that is known to the bot and was edited
     *
     * @var Message
     */
    protected Message $editedMessage;

    /**
     * Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     *
     * @var Message
     */
    protected Message $channelPost;

    /**
     * Optional. New version of a channel post that is known to the bot and was edited
     *
     * @var Message
     */
    protected Message $editedChannelPost;

    /**
     * Optional. New incoming inline query
     *
     * @var InlineQuery
     */
    protected InlineQuery $inlineQuery;

    /**
     * Optional. The result of a inline query that was chosen by a user and sent to their chat partner
     *
     * @var ChosenInlineResult
     */
    protected ChosenInlineResult $chosenInlineResult;

    /**
     * Optional. New incoming callback query
     *
     * @var CallbackQuery
     */
    protected CallbackQuery $callbackQuery;

    /**
     * Optional. New incoming shipping query. Only for invoices with flexible price
     *
     * @var ShippingQuery
     */
    protected ShippingQuery $shippingQuery;

    /**
     * Optional. New incoming pre-checkout query. Contains full information about checkout
     *
     * @var PreCheckoutQuery
     */
    protected PreCheckoutQuery $preCheckoutQuery;

    /**
     * @var Poll
     */
    protected Poll $poll;

    /**
     * @var PollAnswer
     */
    protected PollAnswer $pollAnswer;

    /**
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->updateId;
    }

    /**
     * @param int $updateId
     */
    public function setUpdateId(int $updateId): void
    {
        $this->updateId = $updateId;
    }

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage(Message $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Message
     */
    public function getEditedMessage(): Message
    {
        return $this->editedMessage;
    }

    /**
     * @param Message $editedMessage
     */
    public function setEditedMessage(Message $editedMessage): void
    {
        $this->editedMessage = $editedMessage;
    }

    /**
     * @return Message
     */
    public function getChannelPost(): Message
    {
        return $this->channelPost;
    }

    /**
     * @param Message $channelPost
     */
    public function setChannelPost(Message $channelPost): void
    {
        $this->channelPost = $channelPost;
    }

    /**
     * @return Message
     */
    public function getEditedChannelPost(): Message
    {
        return $this->editedChannelPost;
    }

    /**
     * @param Message $editedChannelPost
     */
    public function setEditedChannelPost(Message $editedChannelPost): void
    {
        $this->editedChannelPost = $editedChannelPost;
    }

    /**
     * @return InlineQuery
     */
    public function getInlineQuery(): InlineQuery
    {
        return $this->inlineQuery;
    }

    /**
     * @param InlineQuery $inlineQuery
     */
    public function setInlineQuery(InlineQuery $inlineQuery): void
    {
        $this->inlineQuery = $inlineQuery;
    }

    /**
     * @return ChosenInlineResult
     */
    public function getChosenInlineResult(): ChosenInlineResult
    {
        return $this->chosenInlineResult;
    }

    /**
     * @param ChosenInlineResult $chosenInlineResult
     */
    public function setChosenInlineResult(ChosenInlineResult $chosenInlineResult): void
    {
        $this->chosenInlineResult = $chosenInlineResult;
    }

    /**
     * @return CallbackQuery
     */
    public function getCallbackQuery(): CallbackQuery
    {
        return $this->callbackQuery;
    }

    /**
     * @param CallbackQuery $callbackQuery
     */
    public function setCallbackQuery(CallbackQuery $callbackQuery): void
    {
        $this->callbackQuery = $callbackQuery;
    }

    /**
     * @return ShippingQuery
     */
    public function getShippingQuery(): ShippingQuery
    {
        return $this->shippingQuery;
    }

    /**
     * @param ShippingQuery $shippingQuery
     */
    public function setShippingQuery(ShippingQuery $shippingQuery): void
    {
        $this->shippingQuery = $shippingQuery;
    }

    /**
     * @return PreCheckoutQuery
     */
    public function getPreCheckoutQuery(): PreCheckoutQuery
    {
        return $this->preCheckoutQuery;
    }

    /**
     * @param PreCheckoutQuery $preCheckoutQuery
     */
    public function setPreCheckoutQuery(PreCheckoutQuery $preCheckoutQuery): void
    {
        $this->preCheckoutQuery = $preCheckoutQuery;
    }

    /**
     * @return Poll
     */
    public function getPoll(): Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     */
    public function setPoll(Poll $poll): void
    {
        $this->poll = $poll;
    }

    /**
     * @return PollAnswer
     */
    public function getPollAnswer(): PollAnswer
    {
        return $this->pollAnswer;
    }

    /**
     * @param PollAnswer $pollAnswer
     */
    public function setPollAnswer(PollAnswer $pollAnswer): void
    {
        $this->pollAnswer = $pollAnswer;
    }
}
