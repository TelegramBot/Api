<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\PollAnswer;

class PollAnswerTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return PollAnswer::class;
    }

    public static function getMinResponse()
    {
        return [
            'option_ids' => [1,2,3,4,5,6],
            'user' => UserTest::getMinResponse(),
            'poll_id' => 123456789,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param PollAnswer $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(123456789, $item->getPollId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals([1,2,3,4,5,6], $item->getOptionIds());
    }

    /**
     * @param PollAnswer $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
