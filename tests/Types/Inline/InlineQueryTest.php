<?php

namespace TelegramBot\Api\Test\Types\Inline;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\Inline\InlineQuery;
use TelegramBot\Api\Types\User;

class InlineQueryTest extends TestCase
{
    protected $inlineQueryFixture = [
        'id' => 1,
        'from' => [
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'id' => 123456,
            'username' => 'iGusev',
        ],
        'query' => 'test_query',
        'offset' => '20'
    ];

    public function testFromResponse1()
    {
        $item = InlineQuery::fromResponse($this->inlineQueryFixture);

        $user = User::fromResponse($this->inlineQueryFixture['from']);

        $this->assertInstanceOf('\TelegramBot\Api\Types\Inline\InlineQuery', $item);
        $this->assertEquals(1, $item->getId());
        $this->assertEquals($user, $item->getFrom());
        $this->assertEquals('20', $item->getOffset());
    }

    public function testFromResponse2()
    {
        $this->inlineQueryFixture['offset'] = '';
        $item = InlineQuery::fromResponse($this->inlineQueryFixture);

        $user = User::fromResponse($this->inlineQueryFixture['from']);

        $this->assertInstanceOf('\TelegramBot\Api\Types\Inline\InlineQuery', $item);
        $this->assertEquals(1, $item->getId());
        $this->assertEquals($user, $item->getFrom());
        $this->assertEquals('', $item->getOffset());
    }

    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        unset($this->inlineQueryFixture['id']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        unset($this->inlineQueryFixture['from']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        unset($this->inlineQueryFixture['query']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    public function testFromResponseException4()
    {
        $this->expectException(InvalidArgumentException::class);

        unset($this->inlineQueryFixture['offset']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    public function testSetId()
    {
        $item = new InlineQuery();
        $item->setId('testId');
        $this->assertEquals('testId', $item->getId());
    }

    public function testSetFrom()
    {
        $item = new InlineQuery();
        $user = User::fromResponse($this->inlineQueryFixture['from']);
        $item->setFrom($user);
        $this->assertEquals($user, $item->getFrom());
    }

    public function testSetQuery()
    {
        $item = new InlineQuery();
        $item->setQuery('testQuery');
        $this->assertEquals('testQuery', $item->getQuery());
    }

    public function testSetOffset()
    {
        $item = new InlineQuery();
        $item->setOffset('20');
        $this->assertEquals('20', $item->getOffset());
    }
}
