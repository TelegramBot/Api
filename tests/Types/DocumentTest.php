<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Document;

class DocumentTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Document::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumbnail' => PhotoSizeTest::getMinResponse(),
        ];
    }

    /**
     * @param Document $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertNull($item->getFileName());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getThumbnail());
    }

    /**
     * @param Document $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals('testFileName', $item->getFileName());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Document();
        $item->setFileSize('s');
    }

    /**
     * file_id and file_unique_id are required
     */
    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        Document::fromResponse([
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumbnail' => [
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }
}
