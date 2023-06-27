<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\VideoNote;

class VideoNoteTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return VideoNote::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'length' => 1,
            'duration' => 2,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'length' => 1,
            'duration' => 2,
            'thumb' => PhotoSizeTest::getMinResponse(),
            'file_size' => 3,
        ];
    }

    /**
     * @param VideoNote $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getLength());
        $this->assertEquals(2, $item->getDuration());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getThumb());
    }

    /**
     * @param VideoNote $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getLength());
        $this->assertEquals(2, $item->getDuration());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumb());
    }
}
