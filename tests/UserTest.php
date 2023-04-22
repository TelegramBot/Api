<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSetDuration()
    {
        $item = new User();
        $item->setId(1);
        $this->assertEquals(1, $item->getId());
    }

    public function testSet64bitId()
    {
        $item = new User();
        $item->setId(2147483648);
        $this->assertEquals(2147483648, $item->getId());
    }

    public function testSetFirstName()
    {
        $item = new User();
        $item->setFirstName('Ilya');
        $this->assertEquals('Ilya', $item->getFirstName());
    }

    public function testSetLastName()
    {
        $item = new User();
        $item->setLastName('Gusev');
        $this->assertEquals('Gusev', $item->getLastName());
    }

    public function testSetUsername()
    {
        $item = new User();
        $item->setUsername('iGusev');
        $this->assertEquals('iGusev', $item->getUsername());
    }

    public function testSetIdException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new User();
        $item->setId('s');
    }

    public function testFromResponse()
    {
        $user = User::fromResponse([
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'id' => 123456,
            'username' => 'iGusev',
            'language_code' => 'en',
            'is_premium' => false,
            'added_to_attachment_menu' => false,
            'can_join_groups' => true,
            'can_read_all_group_messages' => true,
            'supports_inline_queries' => false,
        ]);
        $this->assertInstanceOf('\TelegramBot\Api\Types\User', $user);
        $this->assertEquals(123456, $user->getId());
        $this->assertEquals('Ilya', $user->getFirstName());
        $this->assertEquals('Gusev', $user->getLastName());
        $this->assertEquals('iGusev', $user->getUsername());
        $this->assertEquals('en', $user->getLanguageCode());
        $this->assertEquals(false, $user->getIsPremium());
        $this->assertEquals(false, $user->getAddedToAttachmentMenu());
        $this->assertEquals(true, $user->getCanJoinGroups());
        $this->assertEquals(true, $user->getCanReadAllGroupMessages());
        $this->assertEquals(false, $user->getSupportsInlineQueries());
    }

    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        $user = User::fromResponse([
            'last_name' => 'Gusev',
            'id' => 123456,
            'username' => 'iGusev'
        ]);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        $user = User::fromResponse([
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ]);
    }

}
