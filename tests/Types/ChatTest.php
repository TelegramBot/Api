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
        $this->assertNull($item->getInviteLink());
        $this->assertNull($item->getFirstName());
        $this->assertNull($item->getLastName());
        $this->assertNull($item->getUsername());
        $this->assertNull($item->getBio());
        $this->assertNull($item->getDescription());
        $this->assertNull($item->getSlowModeDelay());
        $this->assertNull($item->getStickerSetName());
        $this->assertNull($item->getCanSetStickerSet());
        $this->assertNull($item->getLinkedChatId());
        $this->assertNull($item->getJoinToSendMessages());
        $this->assertNull($item->getJoinByRequest());
        $this->assertNull($item->getMessageAutoDeleteTime());
        $this->assertNull($item->getHasProtectedContent());
        $this->assertNull($item->getIsForum());
        $this->assertNull($item->getActiveUsernames());
        $this->assertNull($item->getEmojiStatusCustomEmojiId());
        $this->assertNull($item->getHasPrivateForwards());
        $this->assertNull($item->getHasRestrictedVoiceAndVideoMessages());
        $this->assertNull($item->getPhoto());
        $this->assertNull($item->getPinnedMessage());
        $this->assertNull($item->getPermissions());
        $this->assertNull($item->getLocation());
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
        $this->assertEquals('invite_link', $item->getInviteLink());
        $this->assertEquals('Ilya', $item->getFirstName());
        $this->assertEquals('Gusev', $item->getLastName());
        $this->assertEquals('iGusev', $item->getUsername());
        $this->assertEquals('PHP Telegram Bot API', $item->getBio());
        $this->assertEquals('description', $item->getDescription());
        $this->assertEquals(10, $item->getSlowModeDelay());
        $this->assertEquals('sticker_set_name', $item->getStickerSetName());
        $this->assertEquals(true, $item->getCanSetStickerSet());
        $this->assertEquals(2, $item->getLinkedChatId());
        $this->assertEquals(true, $item->getJoinToSendMessages());
        $this->assertEquals(true, $item->getJoinByRequest());
        $this->assertEquals(10000, $item->getMessageAutoDeleteTime());
        $this->assertEquals(true, $item->getHasProtectedContent());
        $this->assertEquals(true, $item->getIsForum());
        $this->assertEquals(['username'], $item->getActiveUsernames());
        $this->assertEquals('emoji_status_custom_emoji_id', $item->getEmojiStatusCustomEmojiId());
        $this->assertEquals(true, $item->getHasPrivateForwards());
        $this->assertEquals(true, $item->getHasRestrictedVoiceAndVideoMessages());
        $this->assertEquals(ChatPhotoTest::createMinInstance(), $item->getPhoto());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getPinnedMessage());
        $this->assertEquals(ChatPermissionsTest::createFullInstance(), $item->getPermissions());
        $this->assertEquals(ChatLocationTest::createMinInstance(), $item->getLocation());
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
