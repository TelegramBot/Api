<?php

namespace TelegramBot\Api\Test;


use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\ArrayOfPhotoSize;

class ArrayOfPhotoSizeTest extends \PHPUnit_Framework_TestCase
{

    public function testFromResponse()
    {
        $actual = ArrayOfPhotoSize::fromResponse(
            array(
                array(
                    'file_id' => 'testFileId1',
                    'file_unique_id' => 'testFileUniqueId1',
                    'width' => 5,
                    'height' => 6,
                    'file_size' => 7
                )
            )
        );

        $expected = array(
            PhotoSize::fromResponse(array(
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ))
        );

        foreach($actual as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
