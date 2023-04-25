<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ForumTopicCreated;

class ForumTopicCreatedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ForumTopicCreated::class;
    }

    public static function getMinResponse()
    {
        return [
            'name' => 'name',
            'icon_color' => 2,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'name' => 'name',
            'icon_color' => 2,
            'icon_custom_emoji_id' => 'icon_custom_emoji_id',
        ];
    }

    /**
     * @param ForumTopicCreated $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertNull($item->getIconCustomEmojiId());
    }

    /**
     * @param ForumTopicCreated $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertEquals('icon_custom_emoji_id', $item->getIconCustomEmojiId());
    }
}
