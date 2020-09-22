<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\VideoNote;

class VideoNoteTest extends \PHPUnit_Framework_TestCase
{
    public function testSetFileId()
    {
        $item = new VideoNote();
        $item->setFileId('testfileId');
        $this->assertAttributeEquals('testfileId', 'fileId', $item);
    }

    public function testGetFileId()
    {
        $item = new VideoNote();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetDuration()
    {
        $item = new VideoNote();
        $item->setDuration(1);
        $this->assertAttributeEquals(1, 'duration', $item);
    }

    public function testGetDuration()
    {
        $item = new VideoNote();
        $item->setDuration(1);
        $this->assertEquals(1, $item->getDuration());
    }

    public function testSetFileSize()
    {
        $item = new VideoNote();
        $item->setFileSize(5);
        $this->assertAttributeEquals(5, 'fileSize', $item);
    }

    public function testGetFileSize()
    {
        $item = new VideoNote();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetThumb()
    {
        $item = new VideoNote();
        $thumb = PhotoSize::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3,
        ));
        $item->setThumb($thumb);
        $this->assertAttributeEquals($thumb, 'thumb', $item);
    }

    public function testGetThumb()
    {
        $item = new VideoNote();
        $thumb = PhotoSize::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3,
        ));
        $item->setThumb($thumb);
        $this->assertEquals($thumb, $item->getThumb());
        $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $item->getThumb());
    }

    public function testFromResponse()
    {
        $item = VideoNote::fromResponse(array(
            'file_id' => 'testFileId1',
            'length' => 1,
            'duration' => 2,
            'file_size' => 3,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 4,
                'height' => 5,
                'file_size' => 6
            )
        ));
        $thumb = PhotoSize::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 4,
            'height' => 5,
            'file_size' => 6
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\VideoNote', $item);
        $this->assertAttributeEquals('testFileId1', 'fileId', $item);
        $this->assertAttributeEquals(1, 'length', $item);
        $this->assertAttributeEquals(2, 'duration', $item);
        $this->assertAttributeEquals(3, 'fileSize', $item);
        $this->assertAttributeEquals($thumb, 'thumb', $item);
        $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $item->getThumb());
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetHeightException()
    {
        $item = new VideoNote();
        $item->setLength('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetDurationException()
    {
        $item = new VideoNote();
        $item->setDuration('s');
    }
    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetFileSizeException()
    {
        $item = new VideoNote();
        $item->setFileSize('s');
    }

}
