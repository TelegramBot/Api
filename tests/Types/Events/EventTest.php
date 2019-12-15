<?php

namespace TelegramBot\Api\Test\Types\Events;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Events\Event;
use TelegramBot\Api\Types\Update;

class EventTest extends TestCase
{
    public function data()
    {
        return [
            [
                function ($update) {
                    return $update;
                },
                function ($update) {
                    return $update;
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
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testConstructor($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $this->assertInstanceOf('TelegramBot\Api\Events\Event', $item);
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetAction($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $this->assertAttributeInstanceOf('\Closure', 'action', $item);
        $this->assertEquals($action, $item->getAction());
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetChecker($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $this->assertAttributeInstanceOf('\Closure', 'checker', $item);
        $this->assertEquals($checker, $item->getChecker());
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testExecuteAction($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $result = $item->executeAction($update);

        $this->assertInstanceOf('\TelegramBot\Api\Types\Update', $result);
        $this->assertEquals($update, $result);
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testExecuteActionFalse($action, $checker, $update) {
        $item = new Event($action, $checker);

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('action');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, 1);
        $reflectionProperty->setAccessible(false);

        $this->assertFalse($item->executeAction($update));
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testExecuteCheker($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $result = $item->executeChecker($update);

        $this->assertInstanceOf('\TelegramBot\Api\Types\Update', $result);
        $this->assertEquals($update, $result);
    }

    /**
     * @param \Closure $action
     * @param \Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testExecuteCheckerFalse($action, $checker, $update) {
        $item = new Event($action, $checker);

        $reflection = new \ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('checker');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, 1);
        $reflectionProperty->setAccessible(false);

        $this->assertFalse($item->executeChecker($update));
    }

}
