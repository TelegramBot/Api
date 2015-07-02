<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\Chat;

class ChatTest extends \PHPUnit_Framework_TestCase
{
    public function testFromResponseGroupChat()
    {
        $item = Chat::fromResponse(array(
            'id' => 1,
            'title' => 'test chat'
        ));

        $this->assertInstanceOf('\TelegramBot\Api\Types\GroupChat', $item);
        $this->assertEquals(1, $item->getId());
        $this->assertEquals('test chat', $item->getTitle());

    }

    public function testFromResponseUser()
    {
        $item = Chat::fromResponse(array(
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'id' => 123456,
            'username' => 'iGusev'
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\User', $item);
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals('Ilya', $item->getFirstName());
        $this->assertEquals('Gusev', $item->getLastName());
        $this->assertEquals('iGusev', $item->getUsername());
    }
}
