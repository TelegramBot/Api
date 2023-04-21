<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\Poll;
use TelegramBot\Api\Types\PollOption;
use PHPUnit\Framework\TestCase;

class PollTest extends TestCase
{
    public function testSetId()
    {
        $item = new Poll();
        $item->setId(123456789);

        $this->assertEquals(123456789, $item->getId());
    }

    public function testSetQuestion()
    {
        $item = new Poll();
        $item->setQuestion('What is the name of Heisenberg from "Breaking bad"?');

        $this->assertEquals('What is the name of Heisenberg from "Breaking bad"?', $item->getQuestion());
    }

    public function testSetOptions()
    {
        $item = new Poll();
        $options = [
            PollOption::fromResponse([
                'text' => 'Walter White',
                'voter_count' => 100
            ]),
        ];

        $item->setOptions($options);

        $this->assertEquals($options, $item->getOptions());

        foreach ($item->getOptions() as $option) {
            $this->assertInstanceOf(PollOption::class, $option);
        }
    }

    public function testSetTotalVoterCount()
    {
        $item = new Poll();
        $item->setTotalVoterCount(17);

        $this->assertEquals(17, $item->getTotalVoterCount());
    }

    public function testSetIsClosed()
    {
        $item = new Poll();
        $item->setIsClosed(true);

        $this->assertTrue($item->isClosed());
    }

    public function testSetIsAnonymous()
    {
        $item = new Poll();
        $item->setIsAnonymous(false);

        $this->assertFalse($item->isAnonymous());
    }

    public function testSetType()
    {
        $item = new Poll();
        $item->setType('regular');

        $this->assertEquals('regular', $item->getType());
    }

    public function testSetAllowsMultipleAnswers()
    {
        $item = new Poll();
        $item->setAllowsMultipleAnswers(true);

        $this->assertTrue($item->isAllowsMultipleAnswers());
    }

    public function testSetCorrectOptionId()
    {
        $item = new Poll();
        $item->setCorrectOptionId(2);

        $this->assertEquals(2, $item->getCorrectOptionId());
    }
}
