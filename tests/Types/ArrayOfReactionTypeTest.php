<?php

namespace TelegramBot\Api\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\ReactionTypeEmoji;
use TelegramBot\Api\Types\ArrayOfReactionType;
use TelegramBot\Api\Types\ReactionTypeCustomEmoji;

class ArrayOfReactionTypeTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfReactionType::fromResponse([
            [
                'emoji' => '👍',
                'type' => 'emoji'
            ],
            [
                'custom_emoji_id' => 'custom_emoji_123',
                'type' => 'custom_emoji'
            ]
        ]);

        $expected = [
            ReactionTypeEmoji::fromResponse([
                'emoji' => '👍',
                'type' => 'emoji'
            ]),
            ReactionTypeCustomEmoji::fromResponse([
                'custom_emoji_id' => 'custom_emoji_123',
                'type' => 'custom_emoji'
            ])
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
