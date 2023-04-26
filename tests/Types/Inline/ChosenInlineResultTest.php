<?php

namespace TelegramBot\Api\Test\Types\Inline;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Test\Types\LocationTest;
use TelegramBot\Api\Test\Types\UserTest;
use TelegramBot\Api\Types\Inline\ChosenInlineResult;

class ChosenInlineResultTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChosenInlineResult::class;
    }

    public static function getMinResponse()
    {
        return [
            'result_id' => 1,
            'from' => UserTest::getMinResponse(),
            'query' => 'test_query',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'result_id' => 1,
            'from' => UserTest::getMinResponse(),
            'query' => 'test_query',
            'location' => LocationTest::getMinResponse(),
            'inline_message_id' => 'inline_message_id',
        ];
    }

    /**
     * @param ChosenInlineResult $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getResultId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertNull($item->getLocation());
        $this->assertNull($item->getInlineMessageId());
    }

    /**
     * @param ChosenInlineResult $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getResultId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertEquals('inline_message_id', $item->getInlineMessageId());
    }
}
