<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Chat;

class ChatTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Chat::class;
    }

    public static function getMinResponse()
    {
        return [
            'id' => 123456,
            'type' => 'private',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'id' => 123456,
            'type' => 'private',
            'title' => 'title',
            'username' => 'iGusev',
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'photo' => ChatPhotoTest::getMinResponse(),
            'bio' => 'PHP Telegram Bot API',
            'description' => 'description',
            'invite_link' => 'invite_link',
            'pinned_message' => MessageTest::getMinResponse(),
            'permissions' => ChatPermissionsTest::getFullResponse(),
            'slow_mode_delay' => 10,
            'sticker_set_name' => 'sticker_set_name',
            'can_set_sticker_set' => true,
            'linked_chat_id' => 2,
            'location' => ChatLocationTest::getMinResponse(),
            'join_to_send_messages' => true,
            'join_by_request' => true,
            'message_auto_delete_time' => 10000,
            'has_protected_content' => true,
            'is_forum' => true,
            'active_usernames' => [
                'username',
            ],
            'emoji_status_custom_emoji_id' => 'emoji_status_custom_emoji_id',
            'has_private_forwards' => true,
            'has_restricted_voice_and_video_messages' => true,
        ];
    }

    /**
     * @param Chat $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals('private', $item->getType());

        $this->assertNull($item->getTitle());
        $this->assertNull($item->getFirstName());
        $this->assertNull($item->getLastName());
        $this->assertNull($item->getUsername());
        $this->assertNull($item->getIsForum());
    }

    /**
     * @param Chat $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals('private', $item->getType());
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('Ilya', $item->getFirstName());
        $this->assertEquals('Gusev', $item->getLastName());
        $this->assertEquals('iGusev', $item->getUsername());
    }

    public function testSet64bitId()
    {
        $chat = new Chat();
        $chat->setId(2147483648);
        $this->assertEquals(2147483648, $chat->getId());
    }

    public function testSetIdException1()
    {
        $this->expectException(InvalidArgumentException::class);

        $chat = new Chat();
        $chat->setId([]);
    }

    public function testSetIdException2()
    {
        $this->expectException(InvalidArgumentException::class);

        $chat = new Chat();
        $chat->setId(null);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Chat::fromResponse([
            'id' => 1
        ]);
    }

    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        Chat::fromResponse([
            'type' => 'private'
        ]);
    }
}
