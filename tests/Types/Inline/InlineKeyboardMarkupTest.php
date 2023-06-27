<?php

namespace TelegramBot\Api\Test\Types\Inline;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class InlineKeyboardMarkupTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return InlineKeyboardMarkup::class;
    }

    public static function getMinResponse()
    {
        return [
            'inline_keyboard' => [
                [
                    ['url' => 'http://test.com', 'text' => 'Link'],
                    ['url' => 'http://test.com', 'text' => 'Link'],
                ],
            ],
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param InlineKeyboardMarkup $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals([[['url' => 'http://test.com', 'text' => 'Link'], ['url' => 'http://test.com', 'text' => 'Link']]], $item->getInlineKeyboard());
    }

    /**
     * @param InlineKeyboardMarkup $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }

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
