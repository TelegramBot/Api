<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatPhoto;

class ChatPhotoTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatPhoto::class;
    }

    public static function getMinResponse()
    {
        return [
            'small_file_id' => 'small_file_id',
            'big_file_id' => 'big_file_id',
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param ChatPhoto $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('small_file_id', $item->getSmallFileId());
        $this->assertEquals('big_file_id', $item->getBigFileId());
    }

    /**
     * @param ChatPhoto $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
