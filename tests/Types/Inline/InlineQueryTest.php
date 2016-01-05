<?php

namespace TelegramBot\Api\Test\Types\Inline;

use TelegramBot\Api\Types\Inline\InlineQuery;
use TelegramBot\Api\Types\User;

class InlineQueryTest extends \PHPUnit_Framework_TestCase
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


    public function testFromResponse2() {
        $this->inlineQueryFixture['offset'] = '';
        $item = InlineQuery::fromResponse($this->inlineQueryFixture);

        $user = User::fromResponse($this->inlineQueryFixture['from']);

        $this->assertInstanceOf('\TelegramBot\Api\Types\Inline\InlineQuery', $item);
        $this->assertEquals(1, $item->getId());
        $this->assertEquals($user, $item->getFrom());
        $this->assertEquals('', $item->getOffset());
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException1() {
        unset($this->inlineQueryFixture['id']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException2() {
        unset($this->inlineQueryFixture['from']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException3() {
        unset($this->inlineQueryFixture['query']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException4() {
        unset($this->inlineQueryFixture['offset']);
        InlineQuery::fromResponse($this->inlineQueryFixture);
    }

    public function testSetId()
    {
        $item = new InlineQuery();
        $item->setId('testId');
        $this->assertAttributeEquals('testId', 'id', $item);
    }

    public function testGetId()
    {
        $item = new InlineQuery();
        $item->setId('testId');
        $this->assertEquals('testId', $item->getId());
    }

    public function testSetFrom() {
        $item = new InlineQuery();
        $user = User::fromResponse($this->inlineQueryFixture['from']);
        $item->setFrom($user);
        $this->assertAttributeEquals($user, 'from', $item);
    }

    public function testGetFrom() {
        $item = new InlineQuery();
        $user = User::fromResponse($this->inlineQueryFixture['from']);
        $item->setFrom($user);
        $this->assertEquals($user, $item->getFrom());
    }

    public function testSetQuery() {
        $item = new InlineQuery();
        $item->setQuery('testQuery');
        $this->assertAttributeEquals('testQuery', 'query', $item);
    }

    public function testGetQuery() {
        $item = new InlineQuery();
        $item->setQuery('testQuery');
        $this->assertEquals('testQuery', $item->getQuery());
    }

    public function testSetOffset() {
        $item = new InlineQuery();
        $item->setOffset('20');
        $this->assertAttributeEquals('20', 'offset', $item);
    }

    public function testGetOffset() {
        $item = new InlineQuery();
        $item->setOffset('20');
        $this->assertEquals('20', $item->getOffset());
    }
}
