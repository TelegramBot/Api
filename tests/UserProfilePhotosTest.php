<?php

namespace TelegramBot\Api\Test;


use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\UserProfilePhotos;

class UserProfilePhotosTest extends \PHPUnit_Framework_TestCase
{
    public function testSetTotalCount()
    {
        $userProfilePhotos = new UserProfilePhotos();
        $userProfilePhotos->setTotalCount(1);
        $this->assertAttributeEquals(1, 'totalCount', $userProfilePhotos);
    }

    public function testGetTotalCount()
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
            $photos[] = array(
                PhotoSize::fromResponse(array(
                    "file_id" => 'testFileId1',
                    'width' => $i,
                    'height' => $i * 2,
                    'file_size' => $i * 3
                ))
            );
        }

        $userProfilePhotos->setPhotos($photos);
        $this->assertAttributeEquals($photos, 'photos', $userProfilePhotos);
    }

    public function testGetPhotos()
    {
        $userProfilePhotos = new UserProfilePhotos();
        $photos = array();
        for ($i = 0; $i < 10; $i++) {
            $photos[] = PhotoSize::fromResponse(array(
                "file_id" => 'testFileId1',
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
                    'width' => 1,
                    'height' => 2,
                    'file_size' => 3
                ))
            )
        );
        $this->assertInstanceOf('\TelegramBot\Api\Types\UserProfilePhotos', $userProfilePhotos);
        $this->assertAttributeEquals(1, 'totalCount', $userProfilePhotos);
        $this->assertAttributeEquals($photos, 'photos', $userProfilePhotos);
        foreach ($userProfilePhotos->getPhotos() as $photoArray) {
            foreach($photoArray as $photo) {
                $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $photo);
            }
        }
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetTotalCountException()
    {
        $item = new UserProfilePhotos();
        $item->setTotalCount('s');
    }
}
