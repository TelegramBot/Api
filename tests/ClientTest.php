<?php

namespace TelegramBot\Api\Test;


use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;
use TelegramBot\Api\Types\Update;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function data()
    {
        return [
            [
                Update::fromResponse([
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
                ]),
            ],
            [
                Update::fromResponse([
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

                ]),
            ],
        ];
    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetInlineQueryChecker($update)
    {
        $reflectionMethod = new \ReflectionMethod('TelegramBot\Api\Client', 'getInlineQueryChecker');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke(null);

        $this->assertInstanceOf('\Closure', $result);

        $this->assertEquals(!is_null($update->getInlineQuery()), call_user_func($result, $update));
    }

    /**
     * @expectedException        \TelegramBot\Api\BadMethodCallException
     * @expectedExceptionMessage Method testMethod not exists
     */
    public function testBadMethodCallException()
    {
        $item = new Client('testToken');

        $item->testMethod();
    }

    public function testConstructor()
    {
        $item = new Client('testToken');

        $this->assertInstanceOf('\TelegramBot\Api\Client', $item);
        $this->assertAttributeInstanceOf('\TelegramBot\Api\BotApi', 'api', $item);
        $this->assertAttributeInstanceOf('\TelegramBot\Api\Events\EventCollection', 'events', $item);
    }

    public function testOn()
    {
        $item = new Client('testToken');

        $mockedEventCollection = $this->getMockBuilder('\TelegramBot\Api\Events\EventCollection')
            ->disableOriginalConstructor()
            ->getMock();

        $mockedEventCollection->expects($this->once())->method('add');

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, $mockedEventCollection);
        $reflectionProperty->setAccessible(false);

        $this->assertSame($item, $item->on(function () {
            return true;
        }));
    }
}
