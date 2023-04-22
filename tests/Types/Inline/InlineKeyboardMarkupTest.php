<?php

namespace TelegramBot\Api\Test\Types\Inline;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class InlineKeyboardMarkupTest extends TestCase
{
    public function testConstructor()
    {
        $item = new InlineKeyboardMarkup([[['url' => 'http://test.com', 'text' => 'Link'], ['url' => 'http://test.com', 'text' => 'Link']]]);

        $this->assertEquals([[['url' => 'http://test.com', 'text' => 'Link'], ['url' => 'http://test.com', 'text' => 'Link']]], $item->getInlineKeyboard());
    }

    public function testSetInlineKeyboard()
    {
        $item = new InlineKeyboardMarkup([[['url' => 'http://test.com', 'text' => 'Link'], ['url' => 'http://test.com', 'text' => 'Link']]]);
        $item->setInlineKeyboard([[['url' => 'http://test.com', 'text' => 'Link']]]);

        $this->assertEquals([[['url' => 'http://test.com', 'text' => 'Link']]], $item->getInlineKeyboard());
    }
}
