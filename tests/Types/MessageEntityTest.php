<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\MessageEntity;

class MessageEntityTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return MessageEntity::class;
    }

    public static function getMinResponse()
    {
        return [
            'type' => 'text_mention',
            'offset' => 108,
            'length' => 10,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'type' => 'text_mention',
            'offset' => 108,
            'length' => 10,
            'url' => 'url',
            'user' => UserTest::getMinResponse(),
            'language' => 'language',
            'custom_emoji_id' => 'custom_emoji_id',
        ];
    }

    /**
     * @param MessageEntity $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(MessageEntity::TYPE_TEXT_MENTION, $item->getType());
        $this->assertEquals(108, $item->getOffset());
        $this->assertEquals(10, $item->getLength());
        $this->assertNull($item->getUrl());
        $this->assertNull($item->getUser());
        $this->assertNull($item->getLanguage());
        $this->assertNull($item->getCustomEmojiId());
    }

    /**
     * @param MessageEntity $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(MessageEntity::TYPE_TEXT_MENTION, $item->getType());
        $this->assertEquals(108, $item->getOffset());
        $this->assertEquals(10, $item->getLength());
        $this->assertEquals('url', $item->getUrl());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals('language', $item->getLanguage());
        $this->assertEquals('custom_emoji_id', $item->getCustomEmojiId());
    }

    public function testPreFromResponse()
    {
        $messageEntity = MessageEntity::fromResponse([
            'type' => 'pre',
            'offset' => 16,
            'length' => 128,
            'language' => 'php',
        ]);

        $this->assertInstanceOf(MessageEntity::class, $messageEntity);
        $this->assertEquals(MessageEntity::TYPE_PRE, $messageEntity->getType());
        $this->assertEquals(16, $messageEntity->getOffset());
        $this->assertEquals(128, $messageEntity->getLength());
        $this->assertNull($messageEntity->getUrl());
        $this->assertNull($messageEntity->getUser());
        $this->assertEquals('php', $messageEntity->getLanguage());
    }
}
