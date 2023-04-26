<?php

namespace TelegramBot\Api\Test\Types\Payments;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Payments\Invoice;

class InvoiceTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Invoice::class;
    }

    public static function getMinResponse()
    {
        return [
            'title' => 'title',
            'description' => 'description',
            'start_parameter' => 'start_parameter',
            'currency' => 'currency',
            'total_amount' => 1000,
        ];
    }

    public static function getFullResponse()
    {
        return static::getMinResponse();
    }

    /**
     * @param Invoice $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('description', $item->getDescription());
        $this->assertEquals('start_parameter', $item->getStartParameter());
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
    }

    /**
     * @param Invoice $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
