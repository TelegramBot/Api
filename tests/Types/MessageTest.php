<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Test\Types\Inline\InlineKeyboardMarkupTest;
use TelegramBot\Api\Test\Types\Payments\InvoiceTest;
use TelegramBot\Api\Test\Types\Payments\SuccessfulPaymentTest;
use TelegramBot\Api\Types\Message;

class MessageTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Message::class;
    }

    public static function getMinResponse()
    {
        return [
            'message_id' => 1,
            'date' => 1682343644,
            'chat' => ChatTest::getMinResponse(),
        ];
    }

    public static function getFullResponse()
    {
        return [
            'message_id' => 1,
            'date' => 1682343644,
            'chat' => ChatTest::getMinResponse(),

            'from' => UserTest::getMinResponse(),
            'forward_from' => UserTest::getMinResponse(),
            'forward_from_chat' => ChatTest::getMinResponse(),
            'forward_from_message_id' => 2,
            'forward_date' => 1682343645,
            'forward_signature' => 'forward_signature',
            'forward_sender_name' => 'forward_sender_name',
            'reply_to_message' => MessageTest::getMinResponse(),
            'via_bot' => UserTest::getMinResponse(),
            'edit_date' => 1682343643,
            'media_group_id' => 3,
            'author_signature' => 'author_signature',
            'text' => 'text',
            'entities' => [
                MessageEntityTest::getMinResponse()
            ],
            'caption_entities' => [
                MessageEntityTest::getMinResponse()
            ],
            'audio' => AudioTest::getMinResponse(),
            'document' => DocumentTest::getMinResponse(),
            'animation' => AnimationTest::getMinResponse(),
            'photo' => [
                PhotoSizeTest::getMinResponse(),
            ],
            'sticker' => StickerTest::getMinResponse(),
            'video' => VideoTest::getMinResponse(),
            'video_note' => VideoNoteTest::getMinResponse(),
            'voice' => VoiceTest::getMinResponse(),
            'caption' => 'caption',
            'contact' => ContactTest::getMinResponse(),
            'location' => LocationTest::getMinResponse(),
            'venue' => VenueTest::getMinResponse(),
            'poll' => PollTest::getMinResponse(),
            'dice' => DiceTest::getMinResponse(),
            'new_chat_members' => [
                UserTest::getMinResponse(),
            ],
            'left_chat_member' => UserTest::getMinResponse(),
            'new_chat_title' => 'new_chat_title',
            'new_chat_photo' => [
                PhotoSizeTest::getMinResponse(),
            ],
            'delete_chat_photo' => true,
            'group_chat_created' => true,
            'supergroup_chat_created' => true,
            'channel_chat_created' => true,
            'migrate_to_chat_id' => 4,
            'migrate_from_chat_id' => 5,
            'pinned_message' => MessageTest::getMinResponse(),
            'invoice' => InvoiceTest::getMinResponse(),
            'successful_payment' => SuccessfulPaymentTest::getMinResponse(),
            'connected_website' => 'connected_website',
            'forum_topic_created' => ForumTopicCreatedTest::getMinResponse(),
            'forum_topic_closed' => ForumTopicClosedTest::getMinResponse(),
            'forum_topic_reopened' => ForumTopicReopenedTest::getMinResponse(),
            'is_topic_message' => true,
            'message_thread_id' => 6,
            'web_app_data' => WebAppDataTest::getMinResponse(),
            'reply_markup' => InlineKeyboardMarkupTest::getMinResponse()
        ];
    }

    /**
     * @param Message $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());

        $this->assertNull($item->getFrom());
        $this->assertNull($item->getReplyToMessage());
        $this->assertNull($item->getViaBot());
        $this->assertNull($item->getEditDate());
        $this->assertNull($item->getMediaGroupId());
        $this->assertNull($item->getAuthorSignature());
        $this->assertNull($item->getText());
        $this->assertNull($item->getEntities());
        $this->assertNull($item->getCaptionEntities());
        $this->assertNull($item->getAudio());
        $this->assertNull($item->getDocument());
        $this->assertNull($item->getAnimation());
        $this->assertNull($item->getPhoto());
        $this->assertNull($item->getSticker());
        $this->assertNull($item->getVideo());
        $this->assertNull($item->getVideoNote());
        $this->assertNull($item->getVoice());
        $this->assertNull($item->getCaption());
        $this->assertNull($item->getContact());
        $this->assertNull($item->getLocation());
        $this->assertNull($item->getVenue());
        $this->assertNull($item->getPoll());
        $this->assertNull($item->getDice());
        $this->assertNull($item->getNewChatMembers());
        $this->assertNull($item->getLeftChatMember());
        $this->assertNull($item->getNewChatTitle());
        $this->assertNull($item->getNewChatPhoto());
        $this->assertNull($item->isDeleteChatPhoto());
        $this->assertNull($item->isGroupChatCreated());
        $this->assertNull($item->isSupergroupChatCreated());
        $this->assertNull($item->isChannelChatCreated());
        $this->assertNull($item->getMigrateToChatId());
        $this->assertNull($item->getMigrateFromChatId());
        $this->assertNull($item->getPinnedMessage());
        $this->assertNull($item->getInvoice());
        $this->assertNull($item->getSuccessfulPayment());
        $this->assertNull($item->getConnectedWebsite());
        $this->assertNull($item->getForumTopicCreated());
        $this->assertNull($item->getForumTopicClosed());
        $this->assertNull($item->getForumTopicReopened());
        $this->assertNull($item->getIsTopicMessage());
        $this->assertNull($item->getMessageThreadId());
        $this->assertNull($item->getWebAppData());
        $this->assertNull($item->getReplyMarkup());
    }

    /**
     * @param Message $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());

        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getReplyToMessage());
        $this->assertEquals(UserTest::createMinInstance(), $item->getViaBot());
        $this->assertEquals(1682343643, $item->getEditDate());
        $this->assertEquals(3, $item->getMediaGroupId());
        $this->assertEquals('author_signature', $item->getAuthorSignature());
        $this->assertEquals('text', $item->getText());
        $this->assertEquals([MessageEntityTest::createMinInstance()], $item->getEntities());
        $this->assertEquals([MessageEntityTest::createMinInstance()], $item->getCaptionEntities());
        $this->assertEquals(AudioTest::createMinInstance(), $item->getAudio());
        $this->assertEquals(DocumentTest::createMinInstance(), $item->getDocument());
        $this->assertEquals(AnimationTest::createMinInstance(), $item->getAnimation());
        $this->assertEquals([PhotoSizeTest::createMinInstance()], $item->getPhoto());
        $this->assertEquals(StickerTest::createMinInstance(), $item->getSticker());
        $this->assertEquals(VideoTest::createMinInstance(), $item->getVideo());
        $this->assertEquals(VideoNoteTest::createMinInstance(), $item->getVideoNote());
        $this->assertEquals(VoiceTest::createMinInstance(), $item->getVoice());
        $this->assertEquals('caption', $item->getCaption());
        $this->assertEquals(ContactTest::createMinInstance(), $item->getContact());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertEquals(VenueTest::createMinInstance(), $item->getVenue());
        $this->assertEquals(PollTest::createMinInstance(), $item->getPoll());
        $this->assertEquals(DiceTest::createMinInstance(), $item->getDice());
        $this->assertEquals([UserTest::createMinInstance()], $item->getNewChatMembers());
        $this->assertEquals(UserTest::createMinInstance(), $item->getLeftChatMember());
        $this->assertEquals('new_chat_title', $item->getNewChatTitle());
        $this->assertEquals([PhotoSizeTest::createMinInstance()], $item->getNewChatPhoto());
        $this->assertTrue($item->isDeleteChatPhoto());
        $this->assertTrue($item->isGroupChatCreated());
        $this->assertTrue($item->isSupergroupChatCreated());
        $this->assertTrue($item->isChannelChatCreated());
        $this->assertEquals(4, $item->getMigrateToChatId());
        $this->assertEquals(5, $item->getMigrateFromChatId());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getPinnedMessage());
        $this->assertEquals(InvoiceTest::createMinInstance(), $item->getInvoice());
        $this->assertEquals(SuccessfulPaymentTest::createMinInstance(), $item->getSuccessfulPayment());
        $this->assertEquals('connected_website', $item->getConnectedWebsite());
        $this->assertEquals(ForumTopicCreatedTest::createMinInstance(), $item->getForumTopicCreated());
        // $this->assertEquals(ForumTopicClosedTest::createMinInstance(), $item->getForumTopicClosed());
        // $this->assertEquals(ForumTopicReopenedTest::createMinInstance(), $item->getForumTopicReopened());
        $this->assertTrue($item->getIsTopicMessage());
        $this->assertEquals(6, $item->getMessageThreadId());
        $this->assertEquals(WebAppDataTest::createMinInstance(), $item->getWebAppData());
        $this->assertEquals(InlineKeyboardMarkupTest::createMinInstance(), $item->getReplyMarkup());
    }

    public function testSet64bitMessageId()
    {
        $item = new Message();
        $item->setMessageId(2147483648);
        $this->assertEquals(2147483648, $item->getMessageId());
    }

    public function testSetMessageIdException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Message();
        $item->setMessageId('s');
    }

    public function testSetDateException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Message();
        $item->setDate('s');
    }

    public function testSetEditDateException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Message();
        $item->setEditDate('s');
    }

    public function testToJson1()
    {
        $data = [
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev'
            ],
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ],
            'migrate_from_chat_id' => 3
        ];

        $item = Message::fromResponse($data);
        $this->assertJson(json_encode($data), $item->toJson());
    }

    public function testToJson2()
    {
        $data = [
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev'
            ],
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ],
            'entities' => [
                [
                    'type' => 'bot_command',
                    'offset' => 0,
                    'length' => 7,
                ]
            ],
            'migrate_from_chat_id' => 3
        ];

        $item = Message::fromResponse($data);
        $this->assertJson(json_encode($data), $item->toJson());
    }
}
