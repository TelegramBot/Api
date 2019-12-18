<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\KeyboardButton;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class ReplyKeyboardMarkupTest extends TestCase
{
    public function testConstructor()
    {
        $item = (new ReplyKeyboardMarkup())->setKeyboard(
            [
                [
                    (new KeyboardButton())->setText('one'),
                    (new KeyboardButton())->setText('two')
                ]
            ]
        );

        $this->assertEquals([
            [
                (new KeyboardButton())->setText('one'),
                (new KeyboardButton())->setText('two')
            ]
        ], $item->getKeyboard());
        $this->assertNull($item->isOneTimeKeyboard());
        $this->assertNull($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
    }

    public function testConstructor2()
    {
        $item = (new ReplyKeyboardMarkup())
            ->setKeyboard(
                [
                    [
                        (new KeyboardButton())->setText('one'),
                        (new KeyboardButton())->setText('two')
                    ]
                ]
            )
            ->setOneTimeKeyboard(true);

        $this->assertEquals([
            [
                (new KeyboardButton())->setText('one'),
                (new KeyboardButton())->setText('two')
            ]
        ], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertNull($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
    }

    public function testConstructor3()
    {
        $item = (new ReplyKeyboardMarkup())
            ->setKeyboard(
                [
                    [
                        (new KeyboardButton())->setText('one'),
                        (new KeyboardButton())->setText('two')
                    ]
                ]
            )
            ->setOneTimeKeyboard(true)
            ->setResizeKeyboard(true);

        $this->assertEquals([
            [
                (new KeyboardButton())->setText('one'),
                (new KeyboardButton())->setText('two')
            ]
        ], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertTrue($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
    }

    public function testConstructor4()
    {
        $item = (new ReplyKeyboardMarkup())
            ->setKeyboard(
                [
                    [
                        (new KeyboardButton())->setText('one'),
                        (new KeyboardButton())->setText('two')
                    ]
                ]
            )
            ->setOneTimeKeyboard(true)
            ->setResizeKeyboard(true)
            ->setSelective(true);

        $this->assertEquals([
            [
                (new KeyboardButton())->setText('one'),
                (new KeyboardButton())->setText('two')
            ]
        ], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertTrue($item->isResizeKeyboard());
        $this->assertTrue($item->isSelective());
    }

    public function testToJson()
    {
        $item = (new ReplyKeyboardMarkup())
            ->setKeyboard(
                [
                    (new KeyboardButton())->setText('one'),
                    (new KeyboardButton())->setText('two')
                ]
            );

        $this->assertEquals(json_encode(['keyboard' => [['text' => 'one'], ['text' => 'two']]]), $item->toJson());
    }
}
