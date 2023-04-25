<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Voice;

class VoiceTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Voice::class;
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
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ];
    }

    /**
     * @param Voice $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param Voice $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        Voice::fromResponse([
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Voice::fromResponse([
            'file_id' => 'testFileId1',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
    }

    public function testSetDurationException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Voice();
        $item->setDuration('s');
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Voice();
        $item->setFileSize('s');
    }

}
