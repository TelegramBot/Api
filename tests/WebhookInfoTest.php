<?php
/**
 * User: boshurik
 * Date: 10.06.2020
 * Time: 19:54
 */

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\WebhookInfo;

class WebhookInfoTest extends \PHPUnit_Framework_TestCase
{
    public function testFromResponse()
    {
        $webhookInfo = WebhookInfo::fromResponse(array(
            'url' => '',
            'has_custom_certificate' => false,
            'pending_update_count' => 0,
            'ip_address' => '',
            'last_error_date' => null,
            'last_error_message' => null,
            'last_synchronization_error_date' => null,
            'max_connections' => 40,
            'allowed_updates' => null
        ));
        $this->assertInstanceOf('\TelegramBot\Api\Types\WebhookInfo', $webhookInfo);
        $this->assertEquals('', $webhookInfo->getUrl());
        $this->assertEquals(false, $webhookInfo->hasCustomCertificate());
        $this->assertEquals(0, $webhookInfo->getPendingUpdateCount());
        $this->assertEquals('', $webhookInfo->getipAddress());
        $this->assertEquals(null, $webhookInfo->getLastErrorDate());
        $this->assertEquals(null, $webhookInfo->getLastErrorMessage());
        $this->assertEquals(null, $webhookInfo->getLastSynchronizationErrorDate());
        $this->assertEquals(40, $webhookInfo->getMaxConnections());
        $this->assertEquals(null, $webhookInfo->getAllowedUpdates());
    }
}
