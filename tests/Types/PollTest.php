<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Poll;

class PollTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Poll::class;
    }

    public static function getMinResponse()
    {
        return [
            'id' => 123456789,
            'question' => 'What is the name of Heisenberg from "Breaking bad"?',
            'options' => [
                PollOptionTest::getMinResponse(),
            ],
            'total_voter_count' => 17,
            'is_closed' => true,
            'is_anonymous' => true,
            'type' => 'regular',
            'allows_multiple_answers' => true,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'id' => 123456789,
            'question' => 'What is the name of Heisenberg from "Breaking bad"?',
            'options' => [
                PollOptionTest::getMinResponse(),
            ],
            'total_voter_count' => 17,
            'is_closed' => true,
            'is_anonymous' => true,
            'type' => 'regular',
            'allows_multiple_answers' => true,
            'correct_option_id' => 2,
        ];
    }

    /**
     * @param Poll $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(123456789, $item->getId());
        $this->assertEquals('What is the name of Heisenberg from "Breaking bad"?', $item->getQuestion());
        $this->assertEquals([PollOptionTest::createMinInstance()], $item->getOptions());
        $this->assertEquals(17, $item->getTotalVoterCount());
        $this->assertTrue($item->isClosed());
        $this->assertTrue($item->isAnonymous());
        $this->assertEquals('regular', $item->getType());
        $this->assertTrue($item->isAllowsMultipleAnswers());
        $this->assertNull($item->getCorrectOptionId());
    }

    /**
     * @param Poll $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(123456789, $item->getId());
        $this->assertEquals('What is the name of Heisenberg from "Breaking bad"?', $item->getQuestion());
        $this->assertEquals([PollOptionTest::createMinInstance()], $item->getOptions());
        $this->assertEquals(17, $item->getTotalVoterCount());
        $this->assertTrue($item->isClosed());
        $this->assertTrue($item->isAnonymous());
        $this->assertEquals('regular', $item->getType());
        $this->assertTrue($item->isAllowsMultipleAnswers());
        $this->assertEquals(2, $item->getCorrectOptionId());
    }
}
