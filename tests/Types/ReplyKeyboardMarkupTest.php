<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class ReplyKeyboardMarkupTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ReplyKeyboardMarkup::class;
    }

    public static function getMinResponse()
    {
        return [
            'keyboard' => [['one', 'two']],
        ];
    }

    public static function getFullResponse()
    {
        return [
            'keyboard' => [['one', 'two']],
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
            'selective' => true
        ];
    }

    /**
     * @param ReplyKeyboardMarkup $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertNull($item->isOneTimeKeyboard());
        $this->assertNull($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
    }

    /**
     * @param ReplyKeyboardMarkup $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertEquals(true, $item->isOneTimeKeyboard());
        $this->assertEquals(true, $item->isResizeKeyboard());
        $this->assertEquals(true, $item->isSelective());
    }

    public function testConstructor()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertEquals(null, $item->isOneTimeKeyboard());
        $this->assertEquals(null, $item->isResizeKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor2()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertEquals(true, $item->isOneTimeKeyboard());
        $this->assertEquals(null, $item->isResizeKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor3()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertEquals(true, $item->isOneTimeKeyboard());
        $this->assertEquals(true, $item->isResizeKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor4()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true, true);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertEquals(true, $item->isOneTimeKeyboard());
        $this->assertEquals(true, $item->isResizeKeyboard());
        $this->assertEquals(true, $item->isSelective());
    }
}
