<?php
namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    public function testSetFileId()
    {
        $item = new File();
        $item->setFileId('testfileId');
        $this->assertAttributeEquals('testfileId', 'fileId', $item);
    }

    public function testGetFileId()
    {
        $item = new File();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetFileSize()
    {
        $item = new File();
        $item->setFileSize(5);
        $this->assertAttributeEquals(5, 'fileSize', $item);
    }

    public function testGetFileSize()
    {
        $item = new File();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetFilePath()
    {
        $item = new File();
        $item->setFilePath('testfilepath');
        $this->assertAttributeEquals('testfilepath', 'filePath', $item);
    }

    public function testGetFilePath()
    {
        $item = new File();
        $item->setFilePath('testfilepath');
        $this->assertEquals('testfilepath', $item->getFilePath());
    }

    public function testFromResponse()
    {
        $item = File::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_size' => 3,
            'file_path' => 'testfilepath'
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\File', $item);
        $this->assertAttributeEquals('testFileId1', 'fileId', $item);
        $this->assertAttributeEquals(3, 'fileSize', $item);
        $this->assertAttributeEquals('testfilepath', 'filePath', $item);
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testFromResponseException()
    {
        $item = File::fromResponse(array(
            'file_size' => 3,
            'file_path' => 'testfilepath'
        ));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetFileSizeException()
    {
        $item = new File();
        $item->setFileSize('s');
    }

}
