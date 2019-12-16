<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\Chat;
use TelegramBot\Api\Types\Document;
use TelegramBot\Api\Types\Location;
use TelegramBot\Api\Types\Audio;
use TelegramBot\Api\Types\Contact;
use TelegramBot\Api\Types\GroupChat;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\Sticker;
use TelegramBot\Api\Types\User;
use TelegramBot\Api\Types\Video;
use TelegramBot\Api\Types\Voice;

class MessageTest extends TestCase
{

    public function testSetMessageId()
    {
        $item = new Message();
        $item->setMessageId(1);
        $this->assertEquals(1, $item->getMessageId());
    }

    public function testSet64bitMessageId()
    {
        $item = new Message();
        $item->setMessageId(2147483648);
        $this->assertEquals(2147483648, $item->getMessageId());
    }

    public function testSetCaption()
    {
        $item = new Message();
        $item->setCaption('test');
        $this->assertEquals('test', $item->getCaption());
    }

    public function testSetDate()
    {
        $item = new Message();
        $item->setDate(1234567);
        $this->assertEquals(1234567, $item->getDate());
    }

    public function testSetForwardDate()
    {
        $item = new Message();
        $item->setForwardDate(1234567);
        $this->assertEquals(1234567, $item->getForwardDate());
    }

    public function testSetFrom()
    {
        $item = new Message();
        $user = User::fromResponse([
            'id' => 1,
            'first_name' => 'Ilya',
            'is_bot' => false,
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ]);
        $item->setFrom($user);
        $this->assertEquals($user, $item->getFrom());
    }

    public function testSetForwardFrom()
    {
        $item = new Message();
        $user = User::fromResponse([
            'id' => 1,
            'first_name' => 'Ilya',
            'is_bot' => false,
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ]);
        $item->setForwardFrom($user);
        $this->assertEquals($user, $item->getForwardFrom());
        $this->assertInstanceOf(User::class, $item->getForwardFrom());
    }

    public function testSetChatGroup()
    {
        $item = new Message();
        $chat = Chat::fromResponse([
            'id' => 1,
            'type' => 'group',
            'title' => 'test chat'
        ]);
        $item->setChat($chat);
        $this->assertEquals($chat, $item->getChat());
        $this->assertInstanceOf(Chat::class, $item->getChat());
    }

    public function testSetChatUser()
    {
        $item = new Message();
        $user = Chat::fromResponse([
            'id' => 1,
            'type' => 'private',
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ]);
        $item->setChat($user);
        $this->assertEquals($user, $item->getChat());
        $this->assertInstanceOf(Chat::class, $item->getChat());
    }

    public function testSetContact()
    {
        $item = new Message();
        $contact = Contact::fromResponse([
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'phone_number' => '123456',
            'user_id' => 'iGusev'
        ]);
        $item->setContact($contact);
        $this->assertEquals($contact, $item->getContact());
        $this->assertInstanceOf(Contact::class, $item->getContact());
    }

    public function testSetDocument()
    {
        $item = new Message();
        $document = Document::fromResponse([
            'file_id' => 'testFileId1',
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
        $item->setDocument($document);
        $this->assertEquals($document, $item->getDocument());
        $this->assertInstanceOf(Document::class, $item->getDocument());
    }

    public function testSetLocation()
    {
        $item = new Message();
        $location = Location::fromResponse(array('latitude' => 55.585827, 'longitude' => 37.675309));
        $item->setLocation($location);
        $this->assertEquals($location, $item->getLocation());
        $this->assertInstanceOf(Location::class, $item->getLocation());
    }

    public function testSetAudio()
    {
        $item = new Message();
        $audio = Audio::fromResponse([
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
        $item->setAudio($audio);
        $this->assertEquals($audio, $item->getAudio());
        $this->assertInstanceOf(Audio::class, $item->getAudio());
    }

    public function testSetVoice()
    {
        $item = new Message();
        $voice = Voice::fromResponse([
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
        $item->setVoice($voice);
        $this->assertEquals($voice, $item->getVoice());
        $this->assertInstanceOf(Voice::class, $item->getVoice());
    }

    public function testSetVideo()
    {
        $item = new Message();
        $video = Video::fromResponse([
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
        $item->setVideo($video);
        $this->assertEquals($video, $item->getVideo());
        $this->assertInstanceOf(Video::class, $item->getVideo());
    }

    public function testSetSticker()
    {
        $item = new Message();
        $sticker = Sticker::fromResponse([
            "file_id" => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3,
            'thumb' => [
                "file_id" => 'testFileId1',
                'width' => 1,
                'height' => 2,
                'file_size' => 3
            ]
        ]);
        $item->setSticker($sticker);
        $this->assertEquals($sticker, $item->getSticker());
        $this->assertInstanceOf(Sticker::class, $item->getSticker());
    }

    public function testSetGroupChatCreated()
    {
        $item = new Message();
        $item->setGroupChatCreated(true);
        $this->assertTrue($item->getGroupChatCreated());
    }

    public function testSetDeleteChatPhoto()
    {
        $item = new Message();
        $item->setDeleteChatPhoto(true);
        $this->assertTrue($item->getDeleteChatPhoto());
    }

    public function testSetLeftChatParticipant()
    {
        $item = new Message();
        $user = User::fromResponse([
            'id' => 1,
            'first_name' => 'Ilya',
            'is_bot' => false,
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ]);
        $item->setLeftChatMember($user);

        $this->assertEquals($user, $item->getLeftChatMember());
        $this->assertInstanceOf(User::class, $item->getLeftChatMember());
    }

    public function testSetNewChatTitle()
    {
        $item = new Message();
        $item->setNewChatTitle('testtitle');
        $this->assertEquals('testtitle', $item->getNewChatTitle());
    }

    public function testSetText()
    {
        $item = new Message();
        $item->setText('testtitle');
        $this->assertEquals('testtitle', $item->getText());
    }

    public function testSetReplyToMessage()
    {
        $item = new Message();
        $replyMessage = Message::fromResponse([
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'is_bot' => false,
                'id' => 123456,
                'username' => 'iGusev'
            ],
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ]
        ]);
        $item->setReplyToMessage($replyMessage);
        $this->assertEquals($replyMessage, $item->getReplyToMessage());
        $this->assertInstanceOf(Message::class, $item->getReplyToMessage());
    }

    public function testSetPhoto()
    {
        $item = new Message();
        $photo = [
            PhotoSize::fromResponse([
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ])
        ];

        $item->setPhoto($photo);

        $this->assertEquals($photo, $item->getPhoto());

        foreach ($item->getPhoto() as $photoItem) {
            $this->assertInstanceOf(PhotoSize::class, $photoItem);
        }
    }

    public function testGetNewChatPhoto()
    {
        $item = new Message();
        $photo = [
            PhotoSize::fromResponse([
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ])
        ];

        $item->setNewChatPhoto($photo);
        $item->setNewChatPhoto($photo);
        $this->assertEquals($photo, $item->getNewChatPhoto());

        foreach ($item->getNewChatPhoto() as $photoItem) {
            $this->assertInstanceOf(PhotoSize::class, $photoItem);
        }
    }

    public function testSetMessageIdException()
    {
        $this->expectException(\TypeError::class);
        $item = new Message();
        $item->setMessageId('s');
    }

    public function testSetDateException()
    {
        $this->expectException(\TypeError::class);
        $item = new Message();
        $item->setDate('s');
    }

    public function testSetForwardDateException()
    {
        $this->expectException(\TypeError::class);
        $item = new Message();
        $item->setForwardDate('s');
    }

    public function testSetSupergroupChatCreated()
    {
        $item = new Message();
        $item->setSupergroupChatCreated(true);

        $this->assertTrue($item->getSupergroupChatCreated());
    }

    public function testGetSupergroupChatCreated()
    {
        $item = Message::fromResponse([
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'is_bot' => false,
                'id' => 123456,
                'username' => 'iGusev'
            ],
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ],
            'supergroup_chat_created' => true
        ]);

        $this->assertTrue($item->getSupergroupChatCreated());
    }

    public function testSetChannelChatCreated()
    {
        $item = new Message();
        $item->setChannelChatCreated(true);

        $this->assertTrue($item->getChannelChatCreated());
    }

    public function testGetChannelChatCreated()
    {
        $item = Message::fromResponse([
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'is_bot' => false,
                'id' => 123456,
                'username' => 'iGusev'
            ],
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ],
            'channel_chat_created' => true
        ]);

        $this->assertTrue($item->getChannelChatCreated());
    }

    public function testSetMigrateToChatId()
    {
        $item = new Message();
        $item->setMigrateToChatId(2);
        $this->assertEquals(2, $item->getMigrateToChatId());
    }

    public function testGetMigrateToChatId()
    {
        $item = Message::fromResponse([
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'is_bot' => false,
                'id' => 123456,
                'username' => 'iGusev'
            ],
            'date' => 2,
            'chat' => [
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ],
            'migrate_to_chat_id' => 2
        ]);

        $this->assertEquals(2, $item->getMigrateToChatId());
    }

    public function testSetMigrateFromChatId()
    {
        $item = new Message();
        $item->setMigrateFromChatId(2);
        $this->assertEquals(2, $item->getMigrateFromChatId());
    }

    public function testGetMigrateFromChatId()
    {
        $item = Message::fromResponse([
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'is_bot' => true,
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
        ]);

        $this->assertEquals(3, $item->getMigrateFromChatId());
    }

    public function testToJson1()
    {
        $data = [
            'message_id' => 1,
            'from' => [
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'is_bot' => false,
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
                'is_bot' => false,
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
                    "type" => "bot_command",
                    "offset" => 0,
                    "length" => 7,
                ]
            ],
            'migrate_from_chat_id' => 3
        ];

        $item = Message::fromResponse($data);
        $this->assertJson(json_encode($data), $item->toJson());
    }
}
