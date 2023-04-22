<?php

namespace TelegramBot\Api\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\ArrayOfUpdates;

class ArrayOfUpdatesTest extends TestCase
{
    public function data()
    {
        return [
            // item 1
            [
                [
                    [
                        'update_id' => 123456,
                        'message' => [
                            'message_id' => 13948,
                            'from' => [
                                'id' => 123,
                                'first_name' => 'Ilya',
                                'last_name' => 'Gusev',
                                'username' => 'iGusev',
                            ],
                            'chat' => [
                                'id' => 123,
                                'type' => 'private',
                                'first_name' => 'Ilya',
                                'last_name' => 'Gusev',
                                'username' => 'iGusev',
                            ],
                            'date' => 1440169809,
                            'text' => 'testText',
                        ],

                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider data
     */
    public function testFromResponse($data)
    {
        $items = ArrayOfUpdates::fromResponse($data);

        $this->assertIsArray($items);

        foreach($items as $item) {
            $this->assertInstanceOf('\TelegramBot\Api\Types\Update', $item);
        }
    }
}
