<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Dice;

class DiceTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Dice::class;
    }

    public static function getMinResponse()
    {
        return [
            'emoji' => '🎉',
            'value' => 5
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param Dice $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('🎉', $item->getEmoji());
        $this->assertEquals(5, $item->getValue());
    }

    /**
     * @param Dice $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
