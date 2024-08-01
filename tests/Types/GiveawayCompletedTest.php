<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\GiveawayCompleted;

class GiveawayCompletedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return GiveawayCompleted::class;
    }

    public static function getMinResponse()
    {
        return [
            'winner_count' => 1
        ];
    }

    public static function getFullResponse()
    {
        return [
            'winner_count' => 1,
            'unclaimed_prize_count' => 1,
            'giveaway_message' => MessageTest::getMinResponse()
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getWinnerCount());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals(1, $item->getUnclaimedPrizeCount());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getGiveawayMessage());
    }
}
