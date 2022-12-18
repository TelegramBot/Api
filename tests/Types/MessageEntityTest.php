<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\MessageEntity;
use TelegramBot\Api\Types\User;

class MessageEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testTextMentionFromResponse()
    {
        $messageEntity = MessageEntity::fromResponse([
            'type' => 'text_mention',
            'offset' => 108,
            'length' => 10,
            'user' => [
                'id' => 4815162342,
                'is_bot' => false,
                'first_name' => 'John',
                'last_name' => 'Locke',
                'username' => 'hunter',
                'language_code' => 'en',
            ],
            'custom_emoji_id' => 1,
        ]);

        $this->assertInstanceOf(MessageEntity::class, $messageEntity);
        $this->assertEquals(MessageEntity::TYPE_TEXT_MENTION, $messageEntity->getType());
        $this->assertEquals(108, $messageEntity->getOffset());
        $this->assertEquals(10, $messageEntity->getLength());
        $this->assertNull($messageEntity->getUrl());
        $this->assertInstanceOf(User::class, $messageEntity->getUser());
        $this->assertEquals(4815162342, $messageEntity->getUser()->getId());
        $this->assertFalse($messageEntity->getUser()->isBot());
        $this->assertEquals('John', $messageEntity->getUser()->getFirstName());
        $this->assertEquals('Locke', $messageEntity->getUser()->getLastName());
        $this->assertEquals('hunter', $messageEntity->getUser()->getUsername());
        $this->assertEquals('en', $messageEntity->getUser()->getLanguageCode());
        $this->assertNull($messageEntity->getLanguage());
        $this->assertEquals(1, $messageEntity->getCustomEmojiId());
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
