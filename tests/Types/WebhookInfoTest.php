<?php
/**
 * User: boshurik
 * Date: 10.06.2020
 * Time: 19:54
 */

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\WebhookInfo;

class WebhookInfoTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return WebhookInfo::class;
    }

    public static function getMinResponse()
    {
        return [
            'url' => 'https://google.com',
            'has_custom_certificate' => false,
            'pending_update_count' => 0,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'url' => 'https://google.com',
            'has_custom_certificate' => false,
            'pending_update_count' => 0,
            'ip_address' => '127.0.0.1',
            'last_error_date' => 1682335353,
            'last_error_message' => 'Last error message',
            'last_synchronization_error_date' => 1682335353,
            'max_connections' => 40,
            'allowed_updates' => ['test']
        ];
    }

    protected function assertMinItem($item)
    {
        $this->assertEquals('https://google.com', $item->getUrl());
        $this->assertEquals(false, $item->hasCustomCertificate());
        $this->assertEquals(0, $item->getPendingUpdateCount());
    }

    protected function assertFullItem($item)
    {
        $this->assertEquals('https://google.com', $item->getUrl());
        $this->assertEquals(false, $item->hasCustomCertificate());
        $this->assertEquals(0, $item->getPendingUpdateCount());
        $this->assertEquals('127.0.0.1', $item->getipAddress());
        $this->assertEquals(1682335353, $item->getLastErrorDate());
        $this->assertEquals('Last error message', $item->getLastErrorMessage());
        $this->assertEquals(1682335353, $item->getLastSynchronizationErrorDate());
        $this->assertEquals(40, $item->getMaxConnections());
        $this->assertEquals(['test'], $item->getAllowedUpdates());
    }
}
