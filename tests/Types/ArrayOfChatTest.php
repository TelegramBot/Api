<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\Chat;
use TelegramBot\Api\Types\ArrayOfChat;
use PHPUnit\Framework\TestCase;

class ArrayOfChatTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfChat::fromResponse([
            [
                'id' => 123456789,
                'type' => 'group',
            ],
            [
                'id' => 123456788,
                'type' => 'private',
            ]
        ]);

        $expected = [
            Chat::fromResponse([
                'id' => 123456789,
                'type' => 'group',
            ]),
            Chat::fromResponse([
                'id' => 123456788,
                'type' => 'private',
            ])
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
