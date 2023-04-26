<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ReplyKeyboardRemove;

class ReplyKeyboardRemoveTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ReplyKeyboardRemove::class;
    }

    public static function getMinResponse()
    {
        return [
            'remove_keyboard' => true,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'remove_keyboard' => true,
            'selective' => true
        ];
    }

    /**
     * @param ReplyKeyboardRemove $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(true, $item->getRemoveKeyboard());
        $this->assertEquals(false, $item->getSelective());
    }

    /**
     * @param ReplyKeyboardRemove $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(true, $item->getRemoveKeyboard());
        $this->assertEquals(true, $item->getSelective());
    }

    public function testDefaultConstructor()
    {
        $keyboard = new ReplyKeyboardRemove();

        $this->assertEquals(true, $keyboard->getRemoveKeyboard());
        $this->assertEquals(false, $keyboard->getSelective());
    }

    public function testConstructor()
    {
        $keyboard = new ReplyKeyboardRemove(false, true);

        $this->assertEquals(false, $keyboard->getRemoveKeyboard());
        $this->assertEquals(true, $keyboard->getSelective());
    }
}
