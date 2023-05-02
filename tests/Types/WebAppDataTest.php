<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\WebAppData;

class WebAppDataTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return WebAppData::class;
    }

    public static function getMinResponse()
    {
        return [
            'data' => 'data',
            'button_text' => 'button_text',
        ];
    }

    public static function getFullResponse()
    {
        return self::getMinResponse();
    }

    /**
     * @param WebAppData $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('data', $item->getData());
        $this->assertEquals('button_text', $item->getButtonText());
    }

    /**
     * @param WebAppData $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertMinItem($item);
    }
}
