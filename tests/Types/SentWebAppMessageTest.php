<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\SentWebAppMessage;

class SentWebAppMessageTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return SentWebAppMessage::class;
    }

    public static function getMinResponse()
    {
        return [];
    }

    public static function getFullResponse()
    {
        return [
            'inline_message_id' => 'inline_message_id',
        ];
    }

    /**
     * @param SentWebAppMessage $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertNull($item->getInlineMessageId());
    }

    /**
     * @param SentWebAppMessage $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('inline_message_id', $item->getInlineMessageId());
    }
}
