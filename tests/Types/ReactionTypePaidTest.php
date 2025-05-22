<?php

namespace TelegramBot\\Api\\Test\\Types;

use TelegramBot\\Api\\Test\\AbstractTypeTest;
use TelegramBot\\Api\\Types\\ReactionTypePaid;

class ReactionTypePaidTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ReactionTypePaid::class;
    }

    public static function getMinResponse()
    {
        return [
            'type' => 'paid'
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('paid', $item->getType());
    }

    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
