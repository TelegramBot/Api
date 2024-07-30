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
        'my_chat_member' => ChatMemberUpdated::class,
        'chat_member' => ChatMemberUpdated::class,
        'chat_join_request' => ChatJoinRequest::class,
        'message_reaction' => MessageReactionUpdated::class,
        'message_reaction_count' => MessageReactionCountUpdated::class,
        'chat_boost' => ChatBoostUpdated::class,
        'chat_boost_removed' => ChatBoostRemoved::class,
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
     * Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only
     * when the bot is blocked or unblocked by the user.
     *
     * @var ChatMemberUpdated|null
     */
    protected $myChatMember;

    /**
     * Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must
     * explicitly specify “chat_member” in the list of allowed_updates to receive these updates.
     *
     * @var ChatMemberUpdated|null
     */
    protected $chatMember;

    /**
     * Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator
     * right in the chat to receive these updates.
     *
     * @var ChatJoinRequest|null
     */
    protected $chatJoinRequest;

    /**
     * Optional. A reaction to a message was changed by a user.
     * The bot must be an administrator in the chat and must explicitly specify 'message_reaction'
     * in the list of allowed_updates to receive these updates. The update isn't received for reactions set by bots.
     *
     * @var MessageReactionUpdated|null
     */
    protected $messageReaction;

    /**
     * Optional. Reactions to a message with anonymous reactions were changed.
     * The bot must be an administrator in the chat and must explicitly specify 'message_reaction_count'
     * in the list of allowed_updates to receive these updates.
     * The updates are grouped and can be sent with delay up to a few minutes.
     *
     * @var MessageReactionCountUpdated|null
     */
    protected $messageReactionCount;

    /**
     * Optional. A chat boost was added or changed.
     * The bot must be an administrator in the chat to receive these updates.
     *
     * @var ChatBoostUpdated|null
     */
    protected $chatBoost;

    /**
     * Optional. A boost was removed from a chat.
     * The bot must be an administrator in the chat to receive these updates.
     *
     * @var ChatBoostRemoved|null
     */
    protected $removedChatBoost;

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

    /**
     * @return ChatMemberUpdated|null
     */
    public function getMyChatMember()
    {
        return $this->myChatMember;
    }

    /**
     * @param ChatMemberUpdated|null $myChatMember
     * @return void
     */
    public function setMyChatMember($myChatMember)
    {
        $this->myChatMember = $myChatMember;
    }

    /**
     * @return ChatMemberUpdated|null
     */
    public function getChatMember()
    {
        return $this->chatMember;
    }

    /**
     * @param ChatMemberUpdated|null $chatMember
     * @return void
     */
    public function setChatMember($chatMember)
    {
        $this->chatMember = $chatMember;
    }

    /**
     * @return ChatJoinRequest|null
     */
    public function getChatJoinRequest()
    {
        return $this->chatJoinRequest;
    }

    /**
     * @param ChatJoinRequest|null $chatJoinRequest
     * @return void
     */
    public function setChatJoinRequest($chatJoinRequest)
    {
        $this->chatJoinRequest = $chatJoinRequest;
    }

    /**
     * @return MessageReactionUpdated|null
     */
    public function getMessageReaction()
    {
        return $this->messageReaction;
    }

    /**
     * @param MessageReactionUpdated|null $messageReaction
     * @return void
     */
    public function setMessageReaction(?MessageReactionUpdated $messageReaction)
    {
        $this->messageReaction = $messageReaction;
    }

    /**
     * @return MessageReactionCountUpdated|null
     */
    public function getMessageReactionCount()
    {
        return $this->messageReactionCount;
    }

    /**
     * @param MessageReactionCountUpdated|null $messageReactionCount
     * @return void
     */
    public function setMessageReactionCount(?MessageReactionCountUpdated $messageReactionCount)
    {
        $this->messageReactionCount = $messageReactionCount;
    }

    /**
     * @return ChatBoostUpdated|null
     */
    public function getChatBoost()
    {
        return $this->chatBoost;
    }

    /**
     * @param ChatBoostUpdated|null $chatBoost
     * @return void
     */
    public function setChatBoost($chatBoost)
    {
        $this->chatBoost = $chatBoost;
    }

    /**
     * @return ChatBoostRemoved|null
     */
    public function getChatBoostRemoved()
    {
        return $this->removedChatBoost;
    }

    /**
     * @param ChatBoostRemoved|null $removedChatBoost
     * @return void
     */
    public function setChatBoostRemoved($removedChatBoost)
    {
        $this->removedChatBoost = $removedChatBoost;
    }
}
