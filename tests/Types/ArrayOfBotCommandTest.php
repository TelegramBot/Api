<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\ArrayOfBotCommand;
use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\BotCommand;

class ArrayOfBotCommandTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfBotCommand::fromResponse([
            [
                'command' => 'start',
                'description' => 'This is a start command!',
            ],
        ]);

        $expected = [
            BotCommand::fromResponse([
                'command' => 'start',
                'description' => 'This is a start command!',
            ])
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
