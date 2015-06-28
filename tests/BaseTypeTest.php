<?php

namespace TelegramBot\Api\Test;


class BaseTypeTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        include_once('tests/_fixtures/TestBaseType.php');
    }

    public function testRequiredParams()
    {
        $testItem = new \TestBaseType();

        $this->assertAttributeEquals(array('test1', 'test2'), 'requiredParams', $testItem);
    }

    public function testValidate() {
        $this->assertTrue(\TestBaseType::validate(['test1' => 1, 'test2' => 2, 'test3' => 3]));
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testValidateFail() {
        $this->assertTrue(\TestBaseType::validate(['test1' => 1]));
    }
}
