<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Audio;

class AudioTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Audio::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
            'performer' => 'testperformer',
            'title' => 'testtitle',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ];
    }

    /**
     * @param Audio $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertNull($item->getPerformer());
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param Audio $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertEquals('testperformer', $item->getPerformer());
        $this->assertEquals('testtitle', $item->getTitle());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
    }

    /**
     * file_id is missing
     */
    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        Audio::fromResponse([
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
    }

    /**
     * duration is missing
     */
    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Audio::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
    }

    /**
     * file_unique_id is missing
     */
    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        Audio::fromResponse([
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
    }

    public function testSetDurationException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Audio();
        $item->setDuration('s');
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Audio();
        $item->setFileSize('s');
    }

}
