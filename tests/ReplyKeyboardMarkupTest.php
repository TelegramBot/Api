<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class ReplyKeyboardMarkupTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));

        $this->assertAttributeEquals(array(array('one', 'two')), 'keyboard', $item);
        $this->assertAttributeEquals(null, 'oneTimeKeyboard', $item);
        $this->assertAttributeEquals(null, 'resizeKeyboard', $item);
        $this->assertAttributeEquals(null, 'selective', $item);
    }

    public function testConstructor2()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true);

        $this->assertAttributeEquals(array(array('one', 'two')), 'keyboard', $item);
        $this->assertAttributeEquals(true, 'oneTimeKeyboard', $item);
        $this->assertAttributeEquals(null, 'resizeKeyboard', $item);
        $this->assertAttributeEquals(null, 'selective', $item);
    }

    public function testConstructor3()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true, true);

        $this->assertAttributeEquals(array(array('one', 'two')), 'keyboard', $item);
        $this->assertAttributeEquals(true, 'oneTimeKeyboard', $item);
        $this->assertAttributeEquals(true, 'resizeKeyboard', $item);
        $this->assertAttributeEquals(null, 'selective', $item);
    }

    public function testConstructor4()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true, true, true);

        $this->assertAttributeEquals(array(array('one', 'two')), 'keyboard', $item);
        $this->assertAttributeEquals(true, 'oneTimeKeyboard', $item);
        $this->assertAttributeEquals(true, 'resizeKeyboard', $item);
        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testSetKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setKeyboard(array(array('one', 'two', 'three')));

        $this->assertAttributeEquals(array(array('one', 'two', 'three')), 'keyboard', $item);
    }

    public function testGetKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setKeyboard(array(array('one', 'two', 'three')));

        $this->assertEquals(array(array('one', 'two', 'three')), $item->getKeyboard());
    }

    public function testSetSelective()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setSelective(true);

        $this->assertAttributeEquals(true, 'selective', $item);
    }

    public function testIsSelective()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setSelective(true);

        $this->assertEquals(true, $item->isSelective());
    }

    public function testSetOneTimeKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setOneTimeKeyboard(false);

        $this->assertAttributeEquals(false, 'oneTimeKeyboard', $item);
    }

    public function testIsOneTimeKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setOneTimeKeyboard(false);

        $this->assertEquals(false, $item->isOneTimeKeyboard());
    }

    public function testSetResizeKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setResizeKeyboard(true);

        $this->assertAttributeEquals(true, 'resizeKeyboard', $item);
    }

    public function testIsResizeKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setResizeKeyboard(true);

        $this->assertEquals(true, $item->isResizeKeyboard());
    }

    public function testToJson()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));

        $this->assertEquals(json_encode(array('keyboard' => array(array('one', 'two')))), $item->toJson());
    }

    public function testToJson2()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true, true, true);

        $this->assertEquals(json_encode(array(
            'keyboard' => array(array('one', 'two')),
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
            'selective' => true,
        )),
            $item->toJson());
    }

    public function testToJson3()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));

        $this->assertEquals(array('keyboard' => array(array('one', 'two'))), $item->toJson(true));
    }

    public function testToJson4()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true, true, true);

        $this->assertEquals(array(
            'keyboard' => array(array('one', 'two')),
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
            'selective' => true,
        ),
            $item->toJson(true));
    }

}
