<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ReplyKeyboardHide;

class ReplyKeyboardHideTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ReplyKeyboardHide::class;
    }

    public static function getMinResponse()
    {
        return [
            'hide_keyboard' => true,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'hide_keyboard' => true,
            'selective' => true
        ];
    }

    /**
     * @param ReplyKeyboardHide $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(true, $item->isHideKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    /**
     * @param ReplyKeyboardHide $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(true, $item->isHideKeyboard());
        $this->assertEquals(true, $item->isSelective());
    }

    public function testConstructor()
    {
        $item = new ReplyKeyboardHide();

        $this->assertEquals(true, $item->isHideKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor2()
    {
        $item = new ReplyKeyboardHide(true, true);

        $this->assertEquals(true, $item->isHideKeyboard());
        $this->assertEquals(true, $item->isSelective());
    }

    public function testConstructor3()
    {
        $item = new ReplyKeyboardHide(false, true);

        $this->assertEquals(false, $item->isHideKeyboard());
        $this->assertEquals(true, $item->isSelective());
    }

    public function testConstructor4()
    {
        $item = new ReplyKeyboardHide(true);

        $this->assertEquals(true, $item->isHideKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }
}
