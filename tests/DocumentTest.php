<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\Document;
use TelegramBot\Api\Types\PhotoSize;

class DocumentTest extends TestCase
{
    public function testSetFileId()
    {
        $item = new Document();
        $item->setFileId('testfileId');
        $this->assertEquals('testfileId', $item->getFileId());
    }

    public function testSetThumb()
    {
        $item = new Document();
        $thumb = PhotoSize::fromResponse([
            "file_id" => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ]);
        $item->setThumb($thumb);
        $this->assertEquals($thumb, $item->getThumb());
        $this->assertInstanceOf(PhotoSize::class, $item->getThumb());
    }

    public function testSetFileName()
    {
        $item = new Document();
        $item->setFileName('testfileName');
        $this->assertEquals('testfileName', $item->getFileName());
    }

    public function testSetFileSize()
    {
        $item = new Document();
        $item->setFileSize(5);
        $this->assertEquals(5, $item->getFileSize());
    }

    public function testSetMimeType()
    {
        $item = new Document();
        $item->setMimeType('audio/mp3');
        $this->assertEquals('audio/mp3', $item->getMimeType());
    }

    public function testSetFileSizeException()
    {
        $this->expectException(\TypeError::class);
        $item = new Document();
        $item->setFileSize('s');
    }

    public function testFromResponse()
    {
        $item = Document::fromResponse([
                'file_id' => 'testFileId1',
                'file_name' => 'testFileName',
                'mime_type' => 'audio/mp3',
                'file_size' => 3,
                'thumb' => [
                    'file_id' => 'testFileId1',
                    'width' => 5,
                    'height' => 6,
                    'file_size' => 7
                ]
        ]);
        $thumb = PhotoSize::fromResponse([
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
        ]);
        $this->assertInstanceOf(Document::class, $item);
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileName', $item->getFileName());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals($thumb, $item->getThumb());
        $this->assertInstanceOf(PhotoSize::class, $item->getThumb());
    }


    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);
        $item = Document::fromResponse([
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumb' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }
}
