<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\MessageReactionUpdated;

class MessageReactionUpdatedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return MessageReactionUpdated::class;
    }

    public static function getMinResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'message_id' => 1,
            'date' => 1682343644,
            'old_reaction' => [
                ReactionTypeEmojiTest::getMinResponse()
            ],
            'new_reaction' => [
                ReactionTypeCustomEmojiTest::getMinResponse()
            ]
        ];
    }

    public static function getFullResponse()
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'message_id' => 1,
            'user' => UserTest::getMinResponse(),
            'actor_chat' => ChatTest::getMinResponse(),
            'date' => 1682343644,
            'old_reaction' => [
                ReactionTypeEmojiTest::getMinResponse()
            ],
            'new_reaction' => [
                 ReactionTypeCustomEmojiTest::getMinResponse()
            ]
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals([ReactionTypeEmojiTest::createMinInstance()], $item->getOldReaction());
        $this->assertEquals([ReactionTypeCustomEmojiTest::createMinInstance()],$item->getNewReaction());

        $this->assertNull($item->getUser());
        $this->assertNull($item->getActorChat());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals(ChatTest::createMinInstance(), $item->getActorChat());
        $this->assertEquals([ReactionTypeEmojiTest::createMinInstance()], $item->getOldReaction());
        $this->assertEquals([ReactionTypeCustomEmojiTest::createMinInstance()],$item->getNewReaction());
    }
}
