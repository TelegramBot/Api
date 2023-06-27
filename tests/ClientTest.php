<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\BadMethodCallException;
use TelegramBot\Api\Client;
use TelegramBot\Api\Events\EventCollection;
use TelegramBot\Api\Types\Inline\InlineQuery;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\Update;

class ClientTest extends TestCase
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
                'testText',
                null,
                null
            ],
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
                        'text' => '/testcommand',
                    ],
                ]),
                'testcommand',
                null,
                null
            ],
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
                        'text' => '/testcommand with attrs',
                    ],
                ]),
                'testcommand',
                'with',
                'attrs'
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
                'testcommand',
                null,
                null
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
        $reflectionMethod = new \ReflectionMethod(Client::class, 'getInlineQueryChecker');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke(null);

        $this->assertInstanceOf(\Closure::class, $result);

        $this->assertEquals(!is_null($update->getInlineQuery()), call_user_func($result, $update));
    }

    public function testBadMethodCallException()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectErrorMessage('Method testMethod not exists');

        $item = new Client('testToken');

        $item->testMethod();
    }

    public function testOn()
    {
        $item = new Client('testToken');

        $mockedEventCollection = $this->getMockBuilder(EventCollection::class)
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

    /**
     * @param Update $update
     * @param string $command
     *
     * @dataProvider data
     */
    public function testGetChecker($update, $command)
    {
        $reflectionMethod = new \ReflectionMethod(Client::class, 'getChecker');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke(null, $command);

        $this->assertInstanceOf(\Closure::class, $result);

        preg_match(Client::REGEXP, $update->getMessage() ? $update->getMessage()->getText() : '', $matches);

        $expected = !empty($matches) && $matches[1] == $command;

        $this->assertEquals($expected, call_user_func($result, $update));

    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testHandle($update)
    {
        $item = new Client('testToken');

        $mockedEventCollection = $this->getMockBuilder(EventCollection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockedEventCollection->expects($this->exactly(2))->method('handle');

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, $mockedEventCollection);
        $reflectionProperty->setAccessible(false);

        $item->handle([$update, $update]);

    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetEvent($update, $command, $attr1, $attr2)
    {
        $reflectionMethod = new \ReflectionMethod(Client::class, 'getEvent');
        $reflectionMethod->setAccessible(true);
        global $test;

        $test = 1;

        $action = function (Message $message) {
            global $test;
            $test = 2;

            return true;
        };

        if($attr1 && $attr2) {
            $action = function (Message $message, $attr1, $attr2) {
                global $test;
                $test = 2;

                return true;
            };
        }
        $action->bind($action, $this);

        $result = $reflectionMethod->invoke(null, $action);

        $this->assertInstanceOf(\Closure::class, $result);

        $mustBeCalled = !is_null($update->getMessage());

        $this->assertEquals(!$mustBeCalled, call_user_func($result, $update));

        if ($mustBeCalled) {
            $this->assertEquals(2, $test);
        } else {
            $this->assertEquals(1, $test);
        }
    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetInlineQueryEvent($update)
    {
        $reflectionMethod = new \ReflectionMethod(Client::class, 'getInlineQueryEvent');
        $reflectionMethod->setAccessible(true);
        global $test;

        $test = 1;

        $action = function (InlineQuery $query) {
            global $test;
            $test = 2;

            return true;
        };

        $action->bind($action, $this);

        $result = $reflectionMethod->invoke(null, $action);

        $this->assertInstanceOf(\Closure::class, $result);

        $mustBeCalled = !is_null($update->getInlineQuery());

        $this->assertEquals(!$mustBeCalled, call_user_func($result, $update));

        if ($mustBeCalled) {
            $this->assertEquals(2, $test);
        } else {
            $this->assertEquals(1, $test);
        }
    }
}
