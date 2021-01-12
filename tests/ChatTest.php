<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\Chat;
use TelegramBot\Api\Types\ChatPhoto;

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

    public function testSet64bitId()
    {
        $chat = new Chat();
        $chat->setId(2147483648);
        $this->assertAttributeEquals(2147483648, 'id', $chat);
    }

    public function testGetId()
    {
        $chat = new Chat();
        $chat->setId(1);
        $this->assertEquals(1, $chat->getId());
    }

    public function testSetType()
    {
        $chat = new Chat();
        $chat->setType('private');
        $this->assertAttributeEquals('private', 'type', $chat);
    }

    public function testGetType()
    {
        $chat = new Chat();
        $chat->setType('private');
        $this->assertEquals('private', $chat->getType());
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

    public function testSetPhoto()
    {
        $chat = new Chat();
        $photo = ChatPhoto::fromResponse([
            'small_file_id' => 'small_file_id',
            'big_file_id' => 'big_file_id'
        ]);
        $chat->setPhoto($photo);
        $this->assertAttributeEquals($photo, 'photo', $chat);
    }

    public function testGetPhoto()
    {
        $chat = new Chat();
        $photo = ChatPhoto::fromResponse([
            'small_file_id' => 'small_file_id',
            'big_file_id' => 'big_file_id'
        ]);
        $chat->setPhoto($photo);
        $this->assertEquals($photo, $chat->getPhoto());
    }

    public function testSetBio()
    {
        $chat = new Chat();
        $chat->setBio('PHP Telegram Bot API');
        $this->assertAttributeEquals('PHP Telegram Bot API', 'bio', $chat);
    }

    public function testGetBio()
    {
        $chat = new Chat();
        $chat->setBio('PHP Telegram Bot API');
        $this->assertEquals('PHP Telegram Bot API', $chat->getBio());
    }

    public function testSetDescriptions()
    {
        $chat = new Chat();
        $chat->setDescription('description');
        $this->assertAttributeEquals('description', 'description', $chat);
    }

    public function testGetDescription()
    {
        $chat = new Chat();
        $chat->setDescription('description');
        $this->assertEquals('description', $chat->getDescription());
    }

    public function testFromResponseUser()
    {
        $item = Chat::fromResponse(array(
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'id' => 123456,
            'username' => 'iGusev',
            'type' => 'private',
            'bio' => 'PHP Telegram Bot API'
        ));

        $this->assertInstanceOf('\TelegramBot\Api\Types\Chat', $item);
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals('Ilya', $item->getFirstName());
        $this->assertEquals('Gusev', $item->getLastName());
        $this->assertEquals('iGusev', $item->getUsername());
        $this->assertEquals('PHP Telegram Bot API', $item->getBio());
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetIdException1()
    {
        $chat = new Chat();
        $chat->setId([]);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetIdException2()
    {
        $chat = new Chat();
        $chat->setId(null);
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
