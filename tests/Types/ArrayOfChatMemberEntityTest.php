<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\ArrayOfChatMemberEntity;
use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\ChatMember;

class ArrayOfChatMemberEntityTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfChatMemberEntity::fromResponse([
            [
                'user' => [
                    'id' => 1,
                    'first_name' => 'first_name',
                ],
                'status' => 'member',
            ],
        ]);

        $expected = [
            ChatMember::fromResponse([
                'user' => [
                    'id' => 1,
                    'first_name' => 'first_name',
                ],
                'status' => 'member',
            ])
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
