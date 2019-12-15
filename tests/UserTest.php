<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\User;

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

    public function testGetFirstName()
    {
        $item = new User();
        $item->setFirstName('Ilya');
        $this->assertEquals('Ilya', $item->getFirstName());
    }

    public function testGetLastName()
    {
        $item = new User();
        $item->setLastName('Gusev');
        $this->assertEquals('Gusev', $item->getLastName());
    }

    public function testGetUsername()
    {
        $item = new User();
        $item->setUsername('iGusev');
        $this->assertEquals('iGusev', $item->getUsername());
    }

    public function testGetLaguageCode()
    {
        $item = new User();
        $item->setLanguageCode('en');
        $this->assertEquals('en', $item->getLanguageCode());
    }

    public function testGetIsBOt()
    {
        $item = new User();
        $item->setIsBot(true);
        $this->assertEquals(true, $item->getIsBot());
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
            'is_bot' => true,
            'language_code' => 'en',
            'id' => 123456,
            'username' => 'iGusev'
        ]);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(123456, $user->getId());
        $this->assertEquals(true, $user->getIsBot());
        $this->assertEquals('en', $user->getLanguageCode());
        $this->assertEquals('Ilya', $user->getFirstName());
        $this->assertEquals('Gusev', $user->getLastName());
        $this->assertEquals('iGusev', $user->getUsername());
    }

    public function testMethodChaining()
    {
        $user = (new User())
            ->setFirstName('Ilya')
            ->setLastName('Gusev')
            ->setIsBot(false)
            ->setLanguageCode('en')
            ->setUsername('iGusev')
            ->setId(123456);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(123456, $user->getId());
        $this->assertEquals(false, $user->getIsBot());
        $this->assertEquals('en', $user->getLanguageCode());
        $this->assertEquals('Ilya', $user->getFirstName());
        $this->assertEquals('Gusev', $user->getLastName());
        $this->assertEquals('iGusev', $user->getUsername());
    }

    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = User::fromResponse(array(
            'last_name' => 'Gusev',
            'id' => 123456,
            'username' => 'iGusev'
        ));
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = User::fromResponse(array(
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
    }
}
