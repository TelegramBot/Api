<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Story
 * This object represents a story.
 *
 * @package TelegramBot\Api\Types
 */
class Story extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chat', 'id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'id' => true,
    ];

    /**
     * Chat that posted the story
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Unique identifier for the story in the chat
     *
     * @var int
     */
    protected $id;

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        if (is_integer($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
    }
}
