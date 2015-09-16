<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\Audio;

class AudioTest extends \PHPUnit_Framework_TestCase
{
    public function testSetFileId()
    {
        $item = new Audio();
        $item->setFileId('testfileId');
        $this->assertAttributeEquals('testfileId', 'fileId', $item);
    }

    public function testGetFileId()
    {
        $item = new Audio();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetDuration()
    {
        $item = new Audio();
        $item->setDuration(1);
        $this->assertAttributeEquals(1, 'duration', $item);
    }

    public function testGetDuration()
    {
        $item = new Audio();
        $item->setDuration(1);
        $this->assertEquals(1, $item->getDuration());
    }

    public function testSetPerformer()
    {
        $item = new Audio();
        $item->setPerformer('test');
        $this->assertAttributeEquals('test', 'performer', $item);
    }

    public function testGetPerformer()
    {
        $item = new Audio();
        $item->setPerformer('test');
        $this->assertEquals('test', $item->getPerformer());
    }

    public function testSetTitle()
    {
        $item = new Audio();
        $item->setTitle('test');
        $this->assertAttributeEquals('test', 'title', $item);
    }

    public function testGetTitle()
    {
        $item = new Audio();
        $item->setTitle('test');
        $this->assertEquals('test', $item->getTitle());
    }

    public function testSetFileSize()
    {
        $item = new Audio();
        $item->setFileSize(5);
        $this->assertAttributeEquals(5, 'fileSize', $item);
    }

    public function testGetFileSize()
    {
        $item = new Audio();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetMimeType()
    {
        $item = new Audio();
        $item->setMimeType('audio/mp3');
        $this->assertAttributeEquals('audio/mp3', 'mimeType', $item);
    }

    public function testGetMimeType()
    {
        $item = new Audio();
        $item->setMimeType('audio/mp3');
        $this->assertEquals('audio/mp3', $item->getMimeType());
    }

    public function testFromResponse()
    {
        $item = Audio::fromResponse(array(
            'file_id' => 'testFileId1',
            'duration' => 1,
            'performer' => 'testperformer',
            'title' => 'testtitle',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\Audio', $item);
        $this->assertAttributeEquals('testFileId1', 'fileId', $item);
        $this->assertAttributeEquals(1, 'duration', $item);
        $this->assertAttributeEquals('testperformer', 'performer', $item);
        $this->assertAttributeEquals('testtitle', 'title', $item);
        $this->assertAttributeEquals('audio/mp3', 'mimeType', $item);
        $this->assertAttributeEquals(3, 'fileSize', $item);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException()
    {
        $item = Audio::fromResponse(array(
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
    }
    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException2()
    {
        $item = Audio::fromResponse(array(
            'file_id' => 'testFileId1',
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetDurationException()
    {
        $item = new Audio();
        $item->setDuration('s');
    }
    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetFileSizeException()
    {
        $item = new Audio();
        $item->setFileSize('s');
    }

}
