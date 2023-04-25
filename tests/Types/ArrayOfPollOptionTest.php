<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\ArrayOfPollOption;
use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\PollOption;

class ArrayOfPollOptionTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfPollOption::fromResponse([
            [
                'text' => 'text',
                'voter_count' => 3
            ]
        ]);

        $expected = [
            PollOption::fromResponse([
                'text' => 'text',
                'voter_count' => 3
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
