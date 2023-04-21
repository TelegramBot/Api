<?php

namespace TelegramBot\Api\Test;


use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\UserProfilePhotos;
use PHPUnit\Framework\TestCase;

class UserProfilePhotosTest extends TestCase
{
    public function testSetTotalCount()
    {
        $userProfilePhotos = new UserProfilePhotos();
        $userProfilePhotos->setTotalCount(1);
        $this->assertEquals(1, $userProfilePhotos->getTotalCount());
    }

    public function testSetPhotos()
    {
        $userProfilePhotos = new UserProfilePhotos();
        $photos = array();
        for ($i = 0; $i < 10; $i++) {
            $photos[] = PhotoSize::fromResponse(array(
                "file_id" => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => $i,
                'height' => $i * 2,
                'file_size' => $i * 3
            ));
        }

        $userProfilePhotos->setPhotos($photos);
        $this->assertEquals($photos, $userProfilePhotos->getPhotos());
    }

    public function testFromResponse()
    {
        $userProfilePhotos = UserProfilePhotos::fromResponse(array(
            "total_count" => 1,
            'photos' => array(
                array(
                    array(
                        "file_id" => 'testFileId1',
                        'file_unique_id' => 'testFileUniqueId1',
                        'width' => 1,
                        'height' => 2,
                        'file_size' => 3
                    )
                )
            )
        ));
        $photos = array(
            array(
                PhotoSize::fromResponse(array(
                    "file_id" => 'testFileId1',
                    'file_unique_id' => 'testFileUniqueId1',
                    'width' => 1,
                    'height' => 2,
                    'file_size' => 3
                ))
            )
        );
        $this->assertInstanceOf(UserProfilePhotos::class, $userProfilePhotos);
        $this->assertEquals(1, $userProfilePhotos->getTotalCount());
        $this->assertEquals($photos, $userProfilePhotos->getPhotos());

        foreach ($userProfilePhotos->getPhotos() as $photoArray) {
            foreach($photoArray as $photo) {
                $this->assertInstanceOf(PhotoSize::class, $photo);
            }
        }
    }

    public function testSetTotalCountException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new UserProfilePhotos();
        $item->setTotalCount('s');
    }
}
