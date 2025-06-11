<?php

declare(strict_types=1);

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\BusinessMessagesDeleted;

class BusinessMessagesDeletedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return BusinessMessagesDeleted::class;
    }

    public static function getMinResponse()
    {
        return [
            'business_connection_id' => 'id',
            'chat' => ChatTest::getMinResponse(),
            'message_ids' => [1, 2, 3],
        ];
    }

    public static function getFullResponse()
    {
        return [
            'business_connection_id' => 'id',
            'chat' => ChatTest::getMinResponse(),
            'message_ids' => [1, 2, 3],
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('id', $item->getBusinessConnectionId());
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals([1, 2, 3], $item->getMessageIds());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals('id', $item->getBusinessConnectionId());
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals([1, 2, 3], $item->getMessageIds());
    }
}
