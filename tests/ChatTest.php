<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\Chat;

class ChatTest extends \PHPUnit_Framework_TestCase
{
    public function testFromResponseGroupChat()
    {
        $item = Chat::fromResponse(array(
            'id' => 1,
            'type' => 'group',
            'title' => 'test chat'
        ));

        $this->assertInstanceOf('\TelegramBot\Api\Types\Chat', $item);
        $this->assertEquals(1, $item->getId());
        $this->assertEquals('test chat', $item->getTitle());

    }

    public function testSetId()
    {
        $chat = new Chat();
        $chat->setId(1);
        $this->assertAttributeEquals(1, 'id', $chat);
    }

    public function testGetId()
    {
        $chat = new Chat();
        $chat->setId(1);
        $this->assertEquals(1, $chat->getId());
    }

    public function testSetTitle()
    {
        $chat = new Chat();
        $chat->setTitle('test chat');
        $this->assertAttributeEquals('test chat', 'title', $chat);
    }

    public function testGetTitle()
    {
        $chat = new Chat();
        $chat->setTitle('test chat');
        $this->assertEquals('test chat', $chat->getTitle());
    }

    public function testSetUsername()
    {
        $chat = new Chat();
        $chat->setUsername('iGusev');
        $this->assertAttributeEquals('iGusev', 'username', $chat);
    }

    public function testGetUsername()
    {
        $chat = new Chat();
        $chat->setUsername('iGusev');
        $this->assertEquals('iGusev', $chat->getUsername());
    }

    public function testSetFirstName()
    {
        $chat = new Chat();
        $chat->setFirstName('Ilya');
        $this->assertAttributeEquals('Ilya', 'firstName', $chat);
    }

    public function testGetFirstName()
    {
        $chat = new Chat();
        $chat->setFirstName('Ilya');
        $this->assertEquals('Ilya', $chat->getFirstName());
    }

    public function testSetLastName()
    {
        $chat = new Chat();
        $chat->setLastName('Gusev');
        $this->assertAttributeEquals('Gusev', 'lastName', $chat);
    }

    public function testGetLastName()
    {
        $chat = new Chat();
        $chat->setLastName('Gusev');
        $this->assertEquals('Gusev', $chat->getLastName());
    }

    public function testFromResponseUser()
    {
        $item = Chat::fromResponse(array(
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'id' => 123456,
            'username' => 'iGusev',
            'type' => 'private'
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\Chat', $item);
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals('Ilya', $item->getFirstName());
        $this->assertEquals('Gusev', $item->getLastName());
        $this->assertEquals('iGusev', $item->getUsername());
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetIdException1()
    {
        $chat = new Chat();
        $chat->setId('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException1()
    {
        $chat = Chat::fromResponse(array(
            'id' => 'fail',
            'title' => 'test chat',
            'type' => 'private'
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException2()
    {
        $chat = Chat::fromResponse(array(
            'id' => 1
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException3()
    {
        $chat = Chat::fromResponse(array(
            'type' => 'private'
        ));
    }
}
