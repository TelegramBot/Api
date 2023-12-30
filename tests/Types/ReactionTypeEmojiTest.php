<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ReactionTypeEmoji;

class ReactionTypeEmojiTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ReactionTypeEmoji::class;
    }

    public static function getMinResponse()
    {
        return [
            'type' => 'emoji',
            'emoji' => '👍'
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param ReactionTypeEmoji $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('emoji', $item->getType());
        $this->assertEquals('👍', $item->getEmoji());
    }

    /**
     * @param ReactionTypeEmoji $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
