<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class BusinessMessagesDeleted
 * This object is received when messages are deleted from a connected business account.
 *
 * @package TelegramBot\Api\Types
 */
class BusinessMessagesDeleted extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['business_connection_id', 'chat', 'message_ids'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'business_connection_id' => true,
        'chat' => Chat::class,
        'message_ids' => true
    ];

    /**
     * Unique identifier of the business connection
     *
     * @var string
     */
    protected $businessConnectionId;

    /**
     * Information about a chat in the business account. The bot may not have access to the chat or the corresponding user.
     *
     * @var Chat
     */
    protected $chat;

    /**
     * The list of identifiers of deleted messages in the chat of the business account
     *
     * @var int[]
     */
    protected $messageIds;

    /**
     * @return string
     */
    public function getBusinessConnectionId()
    {
        return $this->businessConnectionId;
    }

    /**
     * @param string $businessConnectionId
     */
    public function setBusinessConnectionId($businessConnectionId)
    {
        $this->businessConnectionId = $businessConnectionId;
    }

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return int[]
     */
    public function getMessageIds()
    {
        return $this->messageIds;
    }

    /**
     * @param int[] $messageIds
     */
    public function setMessageIds(array $messageIds)
    {
        $this->messageIds = $messageIds;
    }
}
