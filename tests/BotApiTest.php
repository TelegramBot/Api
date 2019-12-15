<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\BotApi;
use TelegramBot\Api\Types\ArrayOfUpdates;
use TelegramBot\Api\Types\Update;

class BotApiTest extends TestCase
{
    public function data()
    {
        return [
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
                            'text' => '/testcommand',
                        ],
                    ],
                    [
                        'update_id' => 376262206,
                        'inline_query' => [
                            'id' => '248571229377660054',
                            'from' => [
                                'id' => 123,
                                'first_name' => 'Ilya',
                                'last_name' => 'Gusev',
                                'username' => 'iGusev',
                            ],
                            'query' => 'h g',
                            'offset' => '',
                        ],

                    ],
                ],
            ],
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
                            'text' => '/testcommand with attrs',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @param Update[] $updates
     *
     * @dataProvider data
     */
    public function testGetUpdates($updates)
    {
        $mock = $this->getMockBuilder('\TelegramBot\Api\BotApi')
            ->setMethods(['call'])
            ->enableOriginalConstructor()
            ->setConstructorArgs(['testToken'])
            ->getMock();

        $mock->expects($this->once())->method('call')->willReturn($updates);


        $expectedResult = ArrayOfUpdates::fromResponse($updates);
        $result = $mock->getUpdates();

        $this->assertInternalType('array', $result);
        $this->assertEquals($expectedResult, $result);

        foreach($result as $key => $item) {
            $this->assertInstanceOf('\TelegramBot\Api\Types\Update', $item);
            $this->assertEquals($expectedResult[$key], $item);
        }
    }
}
