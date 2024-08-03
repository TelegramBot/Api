<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\GiveawayCreated;

class GiveawayCreatedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return GiveawayCreated::class;
    }

    public static function getMinResponse()
    {
        return [];
    }

    public static function getFullResponse()
    {
        return [];
    }

    protected function assertMinItem($item)
    {
    }

    protected function assertFullItem($item)
    {
    }
}
