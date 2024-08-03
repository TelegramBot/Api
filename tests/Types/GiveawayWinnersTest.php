<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\GiveawayWinners;

class GiveawayWinnersTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return GiveawayWinners::class;
    }

    public static function getMinResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'giveaway_message_id' => 1,
            'winners_selection_date' => 1682343643,
            'winner_count' => 1,
            'winners' => [
                UserTest::getMinResponse()
            ],
        ];
    }

    public static function getFullResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'giveaway_message_id' => 1,
            'winners_selection_date' => 1682343643,
            'winner_count' => 1,
            'winners' => [
                UserTest::getMinResponse()
            ],
            'additional_chat_count' => 1,
            'premium_subscription_month_count' => 1,
            'unclaimed_prize_count' => 0,
            'only_new_members' => true,
            'was_refunded' => true,
            'prize_description' => 'prize',
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getGiveawayMessageId());
        $this->assertEquals(1682343643, $item->getWinnersSelectionDate());
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals([UserTest::createMinInstance()], $item->getWinners());
        $this->assertNull($item->getAdditionalChatCount());
        $this->assertNull($item->getPremiumSubscriptionMonthCount());
        $this->assertNull($item->getUnclaimedPrizeCount());
        $this->assertNull($item->getOnlyNewMembers());
        $this->assertNull($item->getWasRefunded());
        $this->assertNull($item->getPrizeDescription());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getGiveawayMessageId());
        $this->assertEquals(1682343643, $item->getWinnersSelectionDate());
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals([UserTest::createMinInstance()], $item->getWinners());
        $this->assertEquals(1, $item->getAdditionalChatCount());
        $this->assertEquals(1, $item->getPremiumSubscriptionMonthCount());
        $this->assertEquals(0, $item->getUnclaimedPrizeCount());
        $this->assertTrue($item->getOnlyNewMembers());
        $this->assertTrue($item->getWasRefunded());
        $this->assertEquals('prize', $item->getPrizeDescription());
    }
}
