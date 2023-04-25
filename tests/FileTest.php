<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\File;

class FileTest extends TestCase
{
    public function testSetFileId()
    {
        $item = new File();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetFileSize()
    {
        $item = new File();
        $item->setFileSize(6);
        $this->assertEquals(6, $item->getFileSize());
    }

    public function testSetFilePath()
    {
        $item = new File();
        $item->setFilePath('testfilepath');
        $this->assertEquals('testfilepath', $item->getFilePath());
    }

    public function testFromResponse()
    {
        $item = File::fromResponse([
            'file_id' => 'testFileId1',
            'file_size' => 3,
            'file_path' => 'testfilepath'
        ]);
        $this->assertInstanceOf(File::class, $item);
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals('testfilepath', $item->getFilePath());
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = File::fromResponse([
            'file_size' => 3,
            'file_path' => 'testfilepath'
        ]);
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new File();
        $item->setFileSize('s');
    }

}
