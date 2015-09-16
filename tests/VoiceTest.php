<?php
namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\Voice;

class VoiceTest extends \PHPUnit_Framework_TestCase
{
    public function testSetFileId()
    {
        $item = new Voice();
        $item->setFileId('testfileId');
        $this->assertAttributeEquals('testfileId', 'fileId', $item);
    }

    public function testGetFileId()
    {
        $item = new Voice();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetDuration()
    {
        $item = new Voice();
        $item->setDuration(1);
        $this->assertAttributeEquals(1, 'duration', $item);
    }

    public function testGetDuration()
    {
        $item = new Voice();
        $item->setDuration(1);
        $this->assertEquals(1, $item->getDuration());
    }

    public function testSetFileSize()
    {
        $item = new Voice();
        $item->setFileSize(5);
        $this->assertAttributeEquals(5, 'fileSize', $item);
    }

    public function testGetFileSize()
    {
        $item = new Voice();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetMimeType()
    {
        $item = new Voice();
        $item->setMimeType('audio/mp3');
        $this->assertAttributeEquals('audio/mp3', 'mimeType', $item);
    }

    public function testGetMimeType()
    {
        $item = new Voice();
        $item->setMimeType('audio/mp3');
        $this->assertEquals('audio/mp3', $item->getMimeType());
    }

    public function testFromResponse()
    {
        $item = Voice::fromResponse(array(
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\Voice', $item);
        $this->assertAttributeEquals('testFileId1', 'fileId', $item);
        $this->assertAttributeEquals(1, 'duration', $item);
        $this->assertAttributeEquals('audio/mp3', 'mimeType', $item);
        $this->assertAttributeEquals(3, 'fileSize', $item);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException()
    {
        $item = Voice::fromResponse(array(
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
        $item = Voice::fromResponse(array(
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
        $item = new Voice();
        $item->setDuration('s');
    }
    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetFileSizeException()
    {
        $item = new Voice();
        $item->setFileSize('s');
    }

}
