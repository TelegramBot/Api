<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\UniqueGiftBackdropColors;

class UniqueGiftBackdropColorsTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return UniqueGiftBackdropColors::class;
    }

    public static function getMinResponse()
    {
        return [
            'center_color' => 1,
            'edge_color' => 2,
            'symbol_color' => 3,
            'text_color' => 4,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getCenterColor());
        $this->assertEquals(2, $item->getEdgeColor());
        $this->assertEquals(3, $item->getSymbolColor());
        $this->assertEquals(4, $item->getTextColor());
    }

    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
