<?php

namespace TelegramBot\Api\Test\Types\Inline;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Test\Types\LocationTest;
use TelegramBot\Api\Test\Types\UserTest;
use TelegramBot\Api\Types\Inline\InlineQuery;

class InlineQueryTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return InlineQuery::class;
    }

    public static function getMinResponse()
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'query' => 'test_query',
            'offset' => '20'
        ];
    }

    public static function getFullResponse()
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'location' => LocationTest::getMinResponse(),
            'query' => 'test_query',
            'offset' => '20'
        ];
    }

    /**
     * @param InlineQuery $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertEquals('20', $item->getOffset());
        $this->assertNull($item->getLocation());
    }

    /**
     * @param InlineQuery $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertEquals('20', $item->getOffset());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
    }
}
