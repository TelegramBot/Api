<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\Voice;
use PHPUnit\Framework\TestCase;

class VoiceTest extends TestCase
{
    public function testSetFileId()
    {
        $item = new Voice();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetUniqueFileId()
    {
        $item = new Voice();
        $item->setFileUniqueId('fileUniqueId');
        $this->assertEquals('fileUniqueId', $item->getFileUniqueId());
    }

    public function testSetDuration()
    {
        $item = new Voice();
        $item->setDuration(1);
        $this->assertEquals(1, $item->getDuration());
    }

    public function testSetFileSize()
    {
        $item = new Voice();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetMimeType()
    {
        $item = new Voice();
        $item->setMimeType('audio/mp3');
        $this->assertEquals('audio/mp3', $item->getMimeType());
    }

    public function testFromResponse()
    {
        $item = Voice::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
        $this->assertInstanceOf(Voice::class, $item);
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Voice::fromResponse([
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Voice::fromResponse([
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
