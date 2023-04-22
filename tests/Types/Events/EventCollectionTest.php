<?php

namespace TelegramBot\Api\Test\Types\Events;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Events\EventCollection;
use TelegramBot\Api\Types\Update;

class EventCollectionTest extends TestCase
{
    public function data()
    {
        return [
            [
                function ($update) {
                    return false;
                },
                function ($update) {
                    return true;
                },
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
        ];
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     *
     * @dataProvider data
     */
    public function testAdd1($action, $checker)
    {
        $item = new EventCollection();
        $item->add($action, $checker);

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $innerItem = $reflectionProperty->getValue($item);
        $reflectionProperty->setAccessible(false);

        $this->assertIsArray($innerItem);
        /* @var \TelegramBot\Api\Events\Event $event */
        foreach($innerItem as $event) {
            $this->assertInstanceOf('\TelegramBot\Api\Events\Event', $event);
        }
    }

    /**
     * @param \Closure $action
     *
     * @dataProvider data
     */
    public function testAdd2($action)
    {
        $item = new EventCollection();
        $item->add($action);

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $innerItem = $reflectionProperty->getValue($item);
        $reflectionProperty->setAccessible(false);

        $this->assertIsArray($innerItem);
        /* @var \TelegramBot\Api\Events\Event $event */
        foreach($innerItem as $event) {
            $this->assertInstanceOf('\TelegramBot\Api\Events\Event', $event);
        }
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testHandle1($action, $checker, $update)
    {
        $item = new EventCollection('testToken');
        $name = 'test';
        $item->add($action, function ($update) use ($name) {
            return true;
        });

        $mockedTracker = $this->getMockBuilder('\TelegramBot\Api\Botan')
            ->disableOriginalConstructor()
            ->getMock();

        // Configure the stub.

        $mockedTracker->expects($this->once())->method('track')->willReturn(null);

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('tracker');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, $mockedTracker);
        $reflectionProperty->setAccessible(false);

        $item->handle($update);
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testHandle2($action, $checker, $update)
    {
        $item = new EventCollection();
        $name = 'test';
        $item->add($action, function ($update) use ($name) {
            return true;
        });

        $mockedTracker = $this->getMockBuilder('\TelegramBot\Api\Botan')
            ->disableOriginalConstructor()
            ->getMock();

        $mockedEvent = $this->getMockBuilder('\TelegramBot\Api\Events\Event')
            ->disableOriginalConstructor()
            ->getMock();

        // Configure the stub.
        $mockedTracker->expects($this->exactly(0))->method('track')->willReturn(null);
        $mockedEvent->expects($this->once())->method('executeChecker')->willReturn(true);
        $mockedEvent->expects($this->once())->method('executeAction')->willReturn(true);

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, [$mockedEvent]);
        $reflectionProperty->setAccessible(false);

        $item->handle($update);
    }

}
