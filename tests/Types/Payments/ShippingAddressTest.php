<?php

namespace TelegramBot\Api\Test\Types\Payments;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Payments\ShippingAddress;

class ShippingAddressTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ShippingAddress::class;
    }

    public static function getMinResponse()
    {
        return [
            'country_code' => 'country_code',
            'state' => 'state',
            'city' => 'city',
            'street_line1' => 'street_line1',
            'street_line2' => 'street_line2',
            'post_code' => 'post_code',
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param ShippingAddress $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('country_code', $item->getCountryCode());
        $this->assertEquals('state', $item->getState());
        $this->assertEquals('city', $item->getCity());
        $this->assertEquals('street_line1', $item->getStreetLine1());
        $this->assertEquals('street_line2', $item->getStreetLine2());
        $this->assertEquals('post_code', $item->getPostCode());
    }

    /**
     * @param ShippingAddress $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
