<?php

namespace TelegramBot\Api\Test\Types\Payments;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Payments\OrderInfo;

class OrderInfoTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return OrderInfo::class;
    }

    public static function getMinResponse()
    {
        return [];
    }

    public static function getFullResponse()
    {
        return [
            'name' => 'name',
            'phone_number' => 'phone_number',
            'email' => 'email',
            'shipping_address' => ShippingAddressTest::getMinResponse()
        ];
    }

    /**
     * @param OrderInfo $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertNull($item->getName());
        $this->assertNull($item->getPhoneNumber());
        $this->assertNull($item->getEmail());
        $this->assertNull($item->getShippingAddress());
    }

    /**
     * @param OrderInfo $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals('phone_number', $item->getPhoneNumber());
        $this->assertEquals('email', $item->getEmail());
        $this->assertEquals(ShippingAddressTest::createMinInstance(), $item->getShippingAddress());
    }
}
