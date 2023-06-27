<?php

namespace TelegramBot\Api\Test\Types\Payments;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Payments\SuccessfulPayment;

class SuccessfulPaymentTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return SuccessfulPayment::class;
    }

    public static function getMinResponse()
    {
        return [
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
            'telegram_payment_charge_id' => 'telegram_payment_charge_id',
            'provider_payment_charge_id' => 'provider_payment_charge_id',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
            'telegram_payment_charge_id' => 'telegram_payment_charge_id',
            'provider_payment_charge_id' => 'provider_payment_charge_id',
            'shipping_option_id' => 'shipping_option_id',
            'order_info' => OrderInfoTest::getFullResponse(),
        ];
    }

    /**
     * @param SuccessfulPayment $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals('telegram_payment_charge_id', $item->getTelegramPaymentChargeId());
        $this->assertEquals('provider_payment_charge_id', $item->getProviderPaymentChargeId());
        $this->assertNull($item->getShippingOptionId());
        $this->assertNull($item->getOrderInfo());
    }

    /**
     * @param SuccessfulPayment $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals('telegram_payment_charge_id', $item->getTelegramPaymentChargeId());
        $this->assertEquals('provider_payment_charge_id', $item->getProviderPaymentChargeId());
        $this->assertEquals('shipping_option_id', $item->getShippingOptionId());
        $this->assertEquals(OrderInfoTest::createFullInstance(), $item->getOrderInfo());
    }
}
