<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\Audio;

class AudioTest extends TestCase
{
    public function testSetFileId()
    {
        $item = new Audio();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetDuration()
    {
        $item = new Audio();
        $item->setDuration(1);
        $this->assertEquals(1, $item->getDuration());
    }

    public function testSetPerformer()
    {
        $item = new Audio();
        $item->setPerformer('test');
        $this->assertEquals('test', $item->getPerformer());
    }

    public function testSetTitle()
    {
        $item = new Audio();
        $item->setTitle('test');
        $this->assertEquals('test', $item->getTitle());
    }

    public function testSetFileSize()
    {
        $item = new Audio();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetMimeType()
    {
        $item = new Audio();
        $item->setMimeType('audio/mp3');
        $this->assertEquals('audio/mp3', $item->getMimeType());
    }

    public function testFromResponse()
    {
        $item = Audio::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
            'performer' => 'testperformer',
            'title' => 'testtitle',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
        $this->assertInstanceOf(Audio::class, $item);
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

        $item = Audio::fromResponse(array(
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
    }

    /**
     * duration is missing
     */
    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Audio::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
    }

    /**
     * file_unique_id is missing
     */
    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = Audio::fromResponse(array(
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
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
