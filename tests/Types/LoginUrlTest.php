<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\LoginUrl;

class LoginUrlTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return LoginUrl::class;
    }

    public static function getMinResponse()
    {
        return [
            'url' => 'https://telegram.org',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'url' => 'https://telegram.org',
            'forward_text' => 'Log in!',
            'bot_username' => 'TestBot',
            'request_write_access' => true
        ];
    }

    /**
     * @param LoginUrl $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('https://telegram.org', $item->getUrl());
        $this->assertNull($item->getForwardText());
        $this->assertNull($item->getBotUsername());
        $this->assertNull($item->isRequestWriteAccess());
    }

    /**
     * @param LoginUrl $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('https://telegram.org', $item->getUrl());
        $this->assertEquals('Log in!', $item->getForwardText());
        $this->assertEquals('TestBot', $item->getBotUsername());
        $this->assertEquals(true, $item->isRequestWriteAccess());
    }
}
