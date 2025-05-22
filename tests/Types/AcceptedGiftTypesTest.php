<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\AcceptedGiftTypes;

class AcceptedGiftTypesTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return AcceptedGiftTypes::class;
    }

    public static function getMinResponse()
    {
        return [
            'unlimited_gifts' => true,
            'limited_gifts' => true,
            'unique_gifts' => true,
            'premium_subscription' => true,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    protected function assertMinItem($item)
    {
        $this->assertTrue($item->getUnlimitedGifts());
        $this->assertTrue($item->getLimitedGifts());
        $this->assertTrue($item->getUniqueGifts());
        $this->assertTrue($item->getPremiumSubscription());
    }

    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
