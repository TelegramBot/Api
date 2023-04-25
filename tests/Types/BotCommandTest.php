<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\BotCommand;

class BotCommandTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return BotCommand::class;
    }

    public static function getMinResponse()
    {
        return [
            'command' => 'start',
            'description' => 'This is a start command!',
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param BotCommand $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('start', $item->getCommand());
        $this->assertEquals('This is a start command!', $item->getDescription());
    }

    /**
     * @param BotCommand $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
