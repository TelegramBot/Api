<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use PHPUnit\Framework\TestCase;

class ReplyKeyboardMarkupTest extends TestCase
{
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

    public function testSetKeyboard()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);
        $item->setKeyboard([['one', 'two', 'three']]);

        $this->assertEquals([['one', 'two', 'three']], $item->getKeyboard());
    }

    public function testSetSelective()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);
        $item->setSelective(true);

        $this->assertEquals(true, $item->isSelective());
    }

    public function testSetOneTimeKeyboard()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);
        $item->setOneTimeKeyboard(false);

        $this->assertEquals(false, $item->isOneTimeKeyboard());
    }

    public function testSetResizeKeyboard()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);
        $item->setResizeKeyboard(true);

        $this->assertEquals(true, $item->isResizeKeyboard());
    }

    public function testToJson()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);

        $this->assertEquals(json_encode(['keyboard' => [['one', 'two']]]), $item->toJson());
    }

    public function testToJson2()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true, true);

        $this->assertEquals(
            json_encode([
            'keyboard' => [['one', 'two']],
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
            'selective' => true,
        ]),
            $item->toJson()
        );
    }

    public function testToJson3()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);

        $this->assertEquals(['keyboard' => [['one', 'two']]], $item->toJson(true));
    }

    public function testToJson4()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true, true);

        $this->assertEquals(
            [
            'keyboard' => [['one', 'two']],
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
            'selective' => true,
        ],
            $item->toJson(true)
        );
    }

}
