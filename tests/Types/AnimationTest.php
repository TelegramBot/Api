<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Animation;

class AnimationTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Animation::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'width' => 10,
            'height' => 20,
            'duration' => 30,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'width' => 10,
            'height' => 20,
            'duration' => 30,
            'thumb' => PhotoSizeTest::getMinResponse(),
            'file_name' => 'file_name',
            'mime_type' => 'mime_type',
            'file_size' => 100
        ];
    }

    /**
     * @param Animation $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(10, $item->getWidth());
        $this->assertEquals(20, $item->getHeight());
        $this->assertEquals(30, $item->getDuration());
        $this->assertNull($item->getThumb());
        $this->assertNull($item->getFileName());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param Animation $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(10, $item->getWidth());
        $this->assertEquals(20, $item->getHeight());
        $this->assertEquals(30, $item->getDuration());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumb());
        $this->assertEquals('file_name', $item->getFileName());
        $this->assertEquals('mime_type', $item->getMimeType());
        $this->assertEquals(100, $item->getFileSize());
    }

    public function testSetDuration()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Animation();
        $item->setDuration('s');
    }

    public function testSetFileSize()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Animation();
        $item->setFileSize('s');
    }

    public function testSetHeight()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Animation();
        $item->setHeight('s');
    }

    public function testSetWidth()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Animation();
        $item->setWidth('s');
    }
}
