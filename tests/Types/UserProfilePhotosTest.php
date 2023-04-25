<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\UserProfilePhotos;

class UserProfilePhotosTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return UserProfilePhotos::class;
    }

    public static function getMinResponse()
    {
        return [
            'total_count' => 1,
            'photos' => [
                [
                    PhotoSizeTest::getMinResponse(),
                ]
            ]
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param UserProfilePhotos $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getTotalCount());
        $this->assertEquals([[PhotoSizeTest::createMinInstance()]], $item->getPhotos());
    }

    /**
     * @param UserProfilePhotos $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }

    public function testSetTotalCountException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new UserProfilePhotos();
        $item->setTotalCount('s');
    }
}
