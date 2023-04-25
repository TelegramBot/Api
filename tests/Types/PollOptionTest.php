<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\PollOption;

class PollOptionTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return PollOption::class;
    }

    public static function getMinResponse()
    {
        return [
            'text' => 'text',
            'voter_count' => 3
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param PollOption $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('text', $item->getText());
        $this->assertEquals(3, $item->getVoterCount());
    }

    /**
     * @param PollOption $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
