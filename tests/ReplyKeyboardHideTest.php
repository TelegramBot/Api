<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\ReplyKeyboardHide;
use PHPUnit\Framework\TestCase;

class ReplyKeyboardHideTest extends TestCase
{
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

    public function testSetHideKeyboard()
    {
        $item = new ReplyKeyboardHide(true);

        $item->setHideKeyboard(false);

        $this->assertEquals(false, $item->isHideKeyboard());
    }

    public function testSetSelective()
    {
        $item = new ReplyKeyboardHide();

        $item->setSelective(true);

        $this->assertEquals(true, $item->isSelective());
    }

    public function testToJson()
    {
        $item = new ReplyKeyboardHide();

        $this->assertEquals(json_encode(['hide_keyboard' => true]), $item->toJson());
    }

    public function testToJson2()
    {
        $item = new ReplyKeyboardHide();

        $this->assertEquals(['hide_keyboard' => true], $item->toJson(true));
    }

    public function testToJson3()
    {
        $item = new ReplyKeyboardHide(true, true);

        $this->assertEquals(json_encode(['hide_keyboard' => true, 'selective' => true]), $item->toJson());
    }

    public function testToJson4()
    {
        $item = new ReplyKeyboardHide(true, true);

        $this->assertEquals(['hide_keyboard' => true, 'selective' => true], $item->toJson(true));
    }
}
