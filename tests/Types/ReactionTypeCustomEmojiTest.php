<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ReactionTypeCustomEmoji;

class ReactionTypeCustomEmojiTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ReactionTypeCustomEmoji::class;
    }

    public static function getMinResponse()
    {
        return [
            'type' => 'custom_emoji',
            'custom_emoji_id' => 'custom_emoji_123'
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param ReactionTypeCustomEmoji $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('custom_emoji', $item->getType());
        $this->assertEquals('custom_emoji_123', $item->getCustomEmojiId());
    }

    /**
     * @param ReactionTypeCustomEmoji $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
