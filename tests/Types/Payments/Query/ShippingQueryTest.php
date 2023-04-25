<?php

namespace TelegramBot\Api\Test\Types\Payments\Query;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Test\Types\Payments\ShippingAddressTest;
use TelegramBot\Api\Test\Types\UserTest;
use TelegramBot\Api\Types\Payments\Query\ShippingQuery;

class ShippingQueryTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ShippingQuery::class;
    }

    public static function getMinResponse()
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'invoice_payload' => 'invoice_payload',
            'shipping_address' => ShippingAddressTest::getMinResponse()
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param ShippingQuery $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals(ShippingAddressTest::createMinInstance(), $item->getShippingAddress());
    }

    /**
     * @param ShippingQuery $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
