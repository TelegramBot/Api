<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use PHPUnit\Framework\TestCase;

class ReplyKeyboardMarkupTest extends TestCase
{
    public function testConstructor()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));

        $this->assertEquals(array(array('one', 'two')),  $item->getKeyboard());
        $this->assertEquals(null, $item->isOneTimeKeyboard());
        $this->assertEquals(null, $item->isResizeKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor2()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true);

        $this->assertEquals(array(array('one', 'two')),  $item->getKeyboard());
        $this->assertEquals(true, $item->isOneTimeKeyboard());
        $this->assertEquals(null, $item->isResizeKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor3()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true, true);

        $this->assertEquals(array(array('one', 'two')),  $item->getKeyboard());
        $this->assertEquals(true, $item->isOneTimeKeyboard());
        $this->assertEquals(true, $item->isResizeKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor4()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')), true, true, true);

        $this->assertEquals(array(array('one', 'two')),  $item->getKeyboard());
        $this->assertEquals(true, $item->isOneTimeKeyboard());
        $this->assertEquals(true, $item->isResizeKeyboard());
        $this->assertEquals(true, $item->isSelective());
    }

    public function testSetKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setKeyboard(array(array('one', 'two', 'three')));

        $this->assertEquals(array(array('one', 'two', 'three')), $item->getKeyboard());
    }

    public function testSetSelective()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setSelective(true);

        $this->assertEquals(true, $item->isSelective());
    }

    public function testSetOneTimeKeyboard()
    {
        $item = new ReplyKeyboardMarkup(array(array('one', 'two')));
        $item->setOneTimeKeyboard(false);

        $this->assertEquals(false, $item->isOneTimeKeyboard());
    }

    public function testSetResizeKeyboard()
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
