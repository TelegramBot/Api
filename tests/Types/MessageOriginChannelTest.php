<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\MessageOriginChannel;
use TelegramBot\Api\Types\Chat;

class MessageOriginChannelTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return MessageOriginChannel::class;
    }

    public static function getMinResponse()
    {
        return [
            'type' => 'channel',
            'date' => 1640908800,
            'chat' => [
                'id' => 123456,
                'type' => 'private',
            ],
            'message_id' => 12345,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'type' => 'channel',
            'date' => 1640908800,
            'chat' => [
                'id' => 123456,
                'type' => 'private',
            ],
            'message_id' => 12345,
            'author_signature' => 'John Doe',
        ];
    }

    /**
     * @param MessageOriginChannel $item
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('channel', $item->getType());
        $this->assertEquals(1640908800, $item->getDate());
        $this->assertEquals(12345, $item->getMessageId());
        $this->assertNull($item->getAuthorSignature());

        $chat = $item->getChat();
        $this->assertInstanceOf(Chat::class, $chat);
        $this->assertEquals(123456, $chat->getId());
        $this->assertEquals('private', $chat->getType());
    }

    /**
     * @param MessageOriginChannel $item
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('channel', $item->getType());
        $this->assertEquals(1640908800, $item->getDate());
        $this->assertEquals(12345, $item->getMessageId());
        $this->assertEquals('John Doe', $item->getAuthorSignature());

        $chat = $item->getChat();
        $this->assertInstanceOf(Chat::class, $chat);
        $this->assertEquals(123456, $chat->getId());
        $this->assertEquals('private', $chat->getType());
    }
}
