<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\MaskPosition;

class MaskPositionTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return MaskPosition::class;
    }

    public static function getMinResponse()
    {
        return [
            'point' => 'mouth',
            'x_shift' => 1.0,
            'y_shift' => 1.0,
            'scale' => 2.0,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param MaskPosition $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('mouth', $item->getPoint());
        $this->assertEquals('1.0', $item->getXShift());
        $this->assertEquals('1.0', $item->getYShift());
        $this->assertEquals('2.0', $item->getScale());
    }

    /**
     * @param MaskPosition $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
