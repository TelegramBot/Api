<?php

namespace TelegramBot\Api\Test\Types\Payments\Query;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Test\Types\Payments\OrderInfoTest;
use TelegramBot\Api\Test\Types\UserTest;
use TelegramBot\Api\Types\Payments\Query\PreCheckoutQuery;

class PreCheckoutQueryTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return PreCheckoutQuery::class;
    }

    public static function getMinResponse()
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
            'shipping_option_id' => 'shipping_option_id',
            'order_info' => OrderInfoTest::getFullResponse()
        ];
    }

    /**
     * @param PreCheckoutQuery $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertNull($item->getShippingOptionId());
        $this->assertNull($item->getOrderInfo());
    }

    /**
     * @param PreCheckoutQuery $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals('shipping_option_id', $item->getShippingOptionId());
        $this->assertEquals(OrderInfoTest::createFullInstance(), $item->getOrderInfo());
    }
}
