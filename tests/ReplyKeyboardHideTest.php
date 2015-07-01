<?php

class ReplyKeyboardHideTest extends PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide();

        $this->assertAttributeEquals(true, 'hideKeyboard', $item);
        $this->assertAttributeEquals(null, 'selective', $item);
    }

    public function testConstructor2()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide(true, true);

        $this->assertAttributeEquals(true, 'hideKeyboard', $item);
        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testConstructor3()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide(false, true);

        $this->assertAttributeEquals(false, 'hideKeyboard', $item);
        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testConstructor4()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide(true);

        $this->assertAttributeEquals(true, 'hideKeyboard', $item);
        $this->assertAttributeEquals(null, 'selective', $item);
    }

    public function testSetHideKeyboard()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide(true);

        $item->setHideKeyboard(false);

        $this->assertAttributeEquals(false, 'hideKeyboard', $item);
    }

    public function testIsHideKeyboard()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide(true);

        $item->setHideKeyboard(false);

        $this->assertEquals(false, $item->isHideKeyboard());
    }

    public function testSetSelective()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide();

        $item->setSelective(true);

        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testIsSelective()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide();

        $item->setSelective(true);

        $this->assertEquals(true, $item->isSelective());
    }

    public function testToJson()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide();

        $this->assertEquals(json_encode(array('hide_keyboard' => true)), $item->toJson());
    }

    public function testToJson2()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide();

        $this->assertEquals(array('hide_keyboard' => true), $item->toJson(true));
    }

    public function testToJson3()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide(true, true);

        $this->assertEquals(json_encode(array('hide_keyboard' => true, 'selective' => true)), $item->toJson());
    }

    public function testToJson4()
    {
        $item = new \TelegramBot\Api\Types\ReplyKeyboardHide(true, true);

        $this->assertEquals(array('hide_keyboard' => true, 'selective' => true), $item->toJson(true));
    }


}
