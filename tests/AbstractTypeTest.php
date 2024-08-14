<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;

abstract class AbstractTypeTest extends TestCase
{
    /**
     * @return string
     */
    /*abstract*/ protected static function getType()
    {
        return new \LogicException(sprintf('Method "%s:%s" must be implemented', static::class, __METHOD__));
    }

    /**
     * @return array
     */
    /*abstract*/ public static function getMinResponse()
    {
        return [];
    }

    /**
     * @return array
     */
    /*abstract*/ public static function getFullResponse()
    {
        return [];
    }

    public static function createMinInstance()
    {
        $class = static::getType();

        return $class::fromResponse(static::getMinResponse());
    }

    public static function createFullInstance()
    {
        $class = static::getType();

        return $class::fromResponse(static::getFullResponse());
    }

    public function testFromResponseMin()
    {
        $item = static::createMinInstance();

        $this->assertInstanceOf(static::getType(), $item);
        $this->assertMinItem($item);
    }

    public function testFromResponseFull()
    {
        $item = static::createFullInstance();

        $this->assertInstanceOf(static::getType(), $item);
        $this->assertFullItem($item);

        $innerJson = $item->toJson();

        $this->assertIsString($innerJson);
    }

    /**
     * @param object $item
     * @return void
     */
    abstract protected function assertMinItem($item);

    /**
     * @param object $item
     * @return void
     */
    abstract protected function assertFullItem($item);
}
