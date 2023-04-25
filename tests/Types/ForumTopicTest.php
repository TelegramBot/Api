<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ForumTopic;

class ForumTopicTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ForumTopic::class;
    }

    public static function getMinResponse()
    {
        return [
            'message_thread_id' => 1,
            'name' => 'name',
            'icon_color' => 2,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'message_thread_id' => 1,
            'name' => 'name',
            'icon_color' => 2,
            'icon_custom_emoji_id' => 'icon_custom_emoji_id',
        ];
    }

    /**
     * @param ForumTopic $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getMessageThreadId());
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertNull($item->getIconCustomEmojiId());
    }

    /**
     * @param ForumTopic $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getMessageThreadId());
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertEquals('icon_custom_emoji_id', $item->getIconCustomEmojiId());
    }
}
