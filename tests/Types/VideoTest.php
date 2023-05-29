<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Video;

class VideoTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Video::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumbnail' => PhotoSizeTest::getMinResponse()
        ];
    }

    /**
     * @param Video $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getDuration());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getThumbnail());
    }

    /**
     * @param Video $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getDuration());
        $this->assertEquals('video/mp4', $item->getMimeType());
        $this->assertEquals(4, $item->getFileSize());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }

    public function testSetHeightException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setHeight('s');
    }

    public function testSetWidthException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setWidth('s');
    }

    public function testSetDurationException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setDuration('s');
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Video();
        $item->setFileSize('s');
    }

    /**
     * file_id is required
     */
    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumbnail' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }
    /**
     * width is required
     */
    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumbnail' => [
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }

    /**
     * height is required
     */
    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumbnail' => [
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }

    /**
     * duration is required
     */
    public function testFromResponseException4()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumbnail' => [
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ]
        ]);
    }

    /**
     * file_unique_id is required
     */
    public function testFromResponseException5()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 1,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
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
