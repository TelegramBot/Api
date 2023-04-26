<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\ArrayOfUser;
use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\User;

class ArrayOfUserTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfUser::fromResponse([
            [
                'id' => 1,
                'first_name' => 'first_name',
            ],
        ]);

        $expected = [
            User::fromResponse([
                'id' => 1,
                'first_name' => 'first_name',
            ])
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
