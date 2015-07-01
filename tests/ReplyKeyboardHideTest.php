<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\ReplyKeyboardHide;

class ReplyKeyboardHideTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $item = new ReplyKeyboardHide();

        $this->assertAttributeEquals(true, 'hideKeyboard', $item);
        $this->assertAttributeEquals(null, 'selective', $item);
    }

    public function testConstructor2()
    {
        $item = new ReplyKeyboardHide(true, true);

        $this->assertAttributeEquals(true, 'hideKeyboard', $item);
        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testConstructor3()
    {
        $item = new ReplyKeyboardHide(false, true);

        $this->assertAttributeEquals(false, 'hideKeyboard', $item);
        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testConstructor4()
    {
        $item = new ReplyKeyboardHide(true);

        $this->assertAttributeEquals(true, 'hideKeyboard', $item);
        $this->assertAttributeEquals(null, 'selective', $item);
    }

    public function testSetHideKeyboard()
    {
        $item = new ReplyKeyboardHide(true);

        $item->setHideKeyboard(false);

        $this->assertAttributeEquals(false, 'hideKeyboard', $item);
    }

    public function testIsHideKeyboard()
    {
        $item = new ReplyKeyboardHide(true);

        $item->setHideKeyboard(false);

        $this->assertEquals(false, $item->isHideKeyboard());
    }

    public function testSetSelective()
    {
        $item = new ReplyKeyboardHide();

        $item->setSelective(true);

        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testIsSelective()
    {
        $item = new ReplyKeyboardHide();

        $item->setSelective(true);

        $this->assertEquals(true, $item->isSelective());
    }

    public function testToJson()
    {
        $item = new ReplyKeyboardHide();

        $this->assertEquals(json_encode(array('hide_keyboard' => true)), $item->toJson());
    }

    public function testToJson2()
    {
        $item = new ReplyKeyboardHide();

        $this->assertEquals(array('hide_keyboard' => true), $item->toJson(true));
    }

    public function testToJson3()
    {
        $item = new ReplyKeyboardHide(true, true);

        $this->assertEquals(json_encode(array('hide_keyboard' => true, 'selective' => true)), $item->toJson());
    }

    public function testToJson4()
    {
        $item = new ReplyKeyboardHide(true, true);

        $this->assertEquals(array('hide_keyboard' => true, 'selective' => true), $item->toJson(true));
    }
}
