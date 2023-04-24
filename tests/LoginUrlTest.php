<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\LoginUrl;

class LoginUrlTest extends TestCase
{
    public function testGetUrl()
    {
        $loginUrl = new LoginUrl();
        $loginUrl->setUrl('https://telegram.org');

        $this->assertEquals('https://telegram.org', $loginUrl->getUrl());
    }

    public function testGetForwardText()
    {
        $loginUrl = new LoginUrl();
        $loginUrl->setForwardText('Log in!');

        $this->assertEquals('Log in!', $loginUrl->getForwardText());
    }

    public function testGetBotUsername()
    {
        $loginUrl = new LoginUrl();
        $loginUrl->setBotUsername('TestBot');

        $this->assertEquals('TestBot', $loginUrl->getBotUsername());
    }

    public function testGetRequestWriteAccess()
    {
        $loginUrl = new LoginUrl();
        $loginUrl->setRequestWriteAccess(true);

        $this->assertEquals(true, $loginUrl->isRequestWriteAccess());
    }

    public function testFromResponse()
    {
        $loginUrl = LoginUrl::fromResponse([
            'url' => 'https://telegram.org',
            'forward_text' => 'Log in!',
            'bot_username' => 'TestBot',
            'request_write_access' => true
        ]);

        $this->assertInstanceOf('\TelegramBot\Api\Types\LoginUrl', $loginUrl);
        $this->assertEquals('https://telegram.org', $loginUrl->getUrl());
        $this->assertEquals('Log in!', $loginUrl->getForwardText());
        $this->assertEquals('TestBot', $loginUrl->getBotUsername());
        $this->assertEquals(true, $loginUrl->isRequestWriteAccess());
    }
}
