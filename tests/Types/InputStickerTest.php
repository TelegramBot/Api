<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\InputSticker;
use TelegramBot\Api\Test\AbstractTypeTest;

class InputStickerTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return InputSticker::class;
    }

    public static function getMinResponse()
    {
        return [
            'sticker' => 'file',
            'format' => 'static',
            'emoji_list' => ['😀']
        ];
    }

    public static function getFullResponse()
    {
        return [
            'sticker' => 'file',
            'format' => 'static',
            'emoji_list' => ['😀'],
            'mask_position' => MaskPositionTest::getMinResponse(),
            'keywords' => ['keywords']
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('file', $item->getSticker());
        $this->assertEquals('static', $item->getFormat());
        $this->assertEquals(['😀'], $item->getEmojiList());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals('file', $item->getSticker());
        $this->assertEquals('static', $item->getFormat());
        $this->assertEquals(['😀'], $item->getEmojiList());
        $this->assertEquals(MaskPositionTest::createMinInstance(), $item->getMaskPosition());
        $this->assertEquals(['keywords'], $item->getKeywords());
    }
}
