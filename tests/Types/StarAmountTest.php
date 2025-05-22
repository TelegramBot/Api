<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\StarAmount;

class StarAmountTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return StarAmount::class;
    }

    public static function getMinResponse()
    {
        return [
            'amount' => 1,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'amount' => 2,
            'nanostar_amount' => 100,
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getAmount());
        $this->assertNull($item->getNanostarAmount());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(2, $item->getAmount());
        $this->assertEquals(100, $item->getNanostarAmount());
    }
}
