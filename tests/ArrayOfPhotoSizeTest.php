<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\ArrayOfPhotoSize;

class ArrayOfPhotoSizeTest extends TestCase
{
    public function testFromResponse()
    {
        $actual = ArrayOfPhotoSize::fromResponse(
            [
                [
                    'file_id' => 'testFileId1',
                    'file_unique_id' => 'testFileUniqueId1',
                    'width' => 5,
                    'height' => 6,
                    'file_size' => 7
                ]
            ]
        );

        $expected = [
            PhotoSize::fromResponse([
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ])
        ];

        foreach($actual as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
