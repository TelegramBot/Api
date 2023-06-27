<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\MessageId;

class MessageIdTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return MessageId::class;
    }

    public static function getMinResponse()
    {
        return [
            'message_id' => 100,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param MessageId $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(100, $item->getMessageId());
    }

    /**
     * @param MessageId $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
