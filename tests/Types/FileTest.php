<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\File;

class FileTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return File::class;
    }

    public static function getMinResponse()
    {
        return [
            'file_id' => 'testFileId1',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'file_unique_id',
            'file_size' => 3,
            'file_path' => 'testfilepath'
        ];
    }

    /**
     * @param File $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertNull($item->getFileUniqueId());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getFilePath());
    }

    /**
     * @param File $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals('testfilepath', $item->getFilePath());
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        File::fromResponse([
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
