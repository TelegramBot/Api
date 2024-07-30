<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\MessageReactionCountUpdated;

class MessageReactionCountUpdatedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return MessageReactionCountUpdated::class;
    }

    public static function getMinResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'message_id' => 1,
            'date' => 1682343644,
            'reactions' => [
                ReactionTypeEmojiTest::getMinResponse()
            ]
        ];
    }

    public static function getFullResponse()
    {
        return [
            'chat' => ChatTest::getFullResponse(),
            'message_id' => 1,
            'date' => 1682343644,
            'reactions' => [
                ReactionTypeEmojiTest::getFullResponse()
            ]
        ];
    }


    protected function assertMinItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals([ReactionTypeEmojiTest::createMinInstance()], $item->getReactions());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(ChatTest::createFullInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals([ReactionTypeEmojiTest::createFullInstance()], $item->getReactions());
    }
}
