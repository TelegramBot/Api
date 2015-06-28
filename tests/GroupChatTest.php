<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\GroupChat;

class GroupChatTest extends \PHPUnit_Framework_TestCase
{
    public function testSetId()
    {
        $chat = new GroupChat();
        $chat->setId(1);
        $this->assertAttributeEquals(1, 'id', $chat);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetIdException1()
    {
        $chat = new GroupChat();
        $chat->setId('s');
    }

    public function testGetId()
    {
        $chat = new GroupChat();
        $chat->setId(1);
        $this->assertEquals(1, $chat->getId());
    }

    public function testSetTitle()
    {
        $chat = new GroupChat();
        $chat->setTitle('test chat');
        $this->assertAttributeEquals('test chat', 'title', $chat);
    }

    public function testGetTitle()
    {
        $chat = new GroupChat();
        $chat->setTitle('test chat');
        $this->assertEquals('test chat', $chat->getTitle());
    }

    public function testFromResponse()
    {
        $chat = GroupChat::fromResponse(array(
            'id' => 1,
            'title' => 'test chat'
        ));

        $this->assertInstanceOf('\TelegramBot\Api\Types\GroupChat', $chat);
        $this->assertEquals(1, $chat->getId());
        $this->assertEquals('test chat', $chat->getTitle());
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException1()
    {
        $chat = GroupChat::fromResponse(array(
            'id' => 'fail',
            'title' => 'test chat'
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException2()
    {
        $chat = GroupChat::fromResponse(array(
            'id' => 1
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException3()
    {
        $chat = GroupChat::fromResponse(array(
            'title' => 'test chat'
        ));
    }
}
