<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;

class BaseTypeTest extends TestCase
{
    public function testValidate()
    {
        $this->assertTrue(TestBaseType::validate(['test1' => 1, 'test2' => 2, 'test3' => 3]));
    }

    public function testValidateFail()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->assertTrue(TestBaseType::validate(['test1' => 1]));
    }
}

class TestBaseType extends BaseType
{
    protected static $requiredParams = ['test1', 'test2'];
}
