<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\PhotoSize;

class PhotoSizeTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return PhotoSize::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3
        ];
    }

    /**
     * @param PhotoSize $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param PhotoSize $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getFileSize());
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new PhotoSize();
        $item->setFileSize('s');
    }

    public function testSetHeightException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new PhotoSize();
        $item->setHeight('s');
    }

    public function testSetWidthException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new PhotoSize();
        $item->setWidth('s');
    }
}
