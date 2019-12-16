<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\Voice;

class VoiceTest extends TestCase
{
    public function testSetFileId()
    {
        $item = new Voice();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
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
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ]);
        $this->assertInstanceOf(Voice::class, $item);
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals('audio/mp3', $item->getMimeType());
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $item = Voice::fromResponse(array(
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);
        $item = Voice::fromResponse(array(
            'file_id' => 'testFileId1',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
    }

    public function testSetDurationException()
    {
        $this->expectException(\TypeError::class);
        $item = new Voice();
        $item->setDuration('s');
    }

    public function testSetFileSizeException()
    {
        $this->expectException(\TypeError::class);
        $item = new Voice();
        $item->setFileSize('s');
    }
}
