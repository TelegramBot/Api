<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ReplyParameters
 * Describes reply parameters for the message that is being sent.
 *
 * @package TelegramBot\Api\Types
 */
class ReplyParameters extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['message_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'message_id' => true,
        'chat_id' => true,
        'allow_sending_without_reply' => true,
        'quote' => true,
        'quote_parse_mode' => true,
        'quote_entities' => ArrayOfMessageEntity::class,
        'quote_position' => true,
    ];

    /**
     * Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified
     *
     * @var int
     */
    protected $messageId;

    /**
     * Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username of the channel (in the format @channelusername). Not supported for messages sent on behalf of a business account.
     *
     * @var int|string|null
     */
    protected $chatId;

    /**
     * Optional. Pass True if the message should be sent even if the specified message to be replied to is not found. Always False for replies in another chat or forum topic. Always True for messages sent on behalf of a business account.
     *
     * @var bool|null
     */
    protected $allowSendingWithoutReply;

    /**
     * Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler, and custom_emoji entities. The message will fail to send if the quote isn't found in the original message.
     *
     * @var string|null
     */
    protected $quote;

    /**
     * Optional. Mode for parsing entities in the quote. See formatting options for more details.
     *
     * @var string|null
     */
    protected $quoteParseMode;

    /**
     * Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of quote_parse_mode.
     *
     * @var ArrayOfMessageEntity|null
     */
    protected $quoteEntities;

    /**
     * Optional. Position of the quote in the original message in UTF-16 code units
     *
     * @var int|null
     */
    protected $quotePosition;

    /**
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return void
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return int|string|null
     */
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * @param int|string|null $chatId
     * @return void
     */
    public function setChatId($chatId)
    {
        $this->chatId = $chatId;
    }

    /**
     * @return bool|null
     */
    public function getAllowSendingWithoutReply()
    {
        return $this->allowSendingWithoutReply;
    }

    /**
     * @param bool|null $allowSendingWithoutReply
     * @return void
     */
    public function setAllowSendingWithoutReply($allowSendingWithoutReply)
    {
        $this->allowSendingWithoutReply = $allowSendingWithoutReply;
    }

    /**
     * @return string|null
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param string|null $quote
     * @return void
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }

    /**
     * @return string|null
     */
    public function getQuoteParseMode()
    {
        return $this->quoteParseMode;
    }

    /**
     * @param string|null $quoteParseMode
     * @return void
     */
    public function setQuoteParseMode($quoteParseMode)
    {
        $this->quoteParseMode = $quoteParseMode;
    }

    /**
     * @return ArrayOfMessageEntity|null
     */
    public function getQuoteEntities()
    {
        return $this->quoteEntities;
    }

    /**
     * @param ArrayOfMessageEntity|null $quoteEntities
     * @return void
     */
    public function setQuoteEntities($quoteEntities)
    {
        $this->quoteEntities = $quoteEntities;
    }

    /**
     * @return int|null
     */
    public function getQuotePosition()
    {
        return $this->quotePosition;
    }

    /**
     * @param int|null $quotePosition
     * @return void
     */
    public function setQuotePosition($quotePosition)
    {
        $this->quotePosition = $quotePosition;
    }
}
