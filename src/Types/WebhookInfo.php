<?php
/**
 * User: boshurik
 * Date: 10.06.2020
 * Time: 19:43
 */

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Contains information about the current status of a webhook.
 *
 * @package TelegramBot\Api\Types
 */
class WebhookInfo extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['url', 'has_custom_certificate', 'pending_update_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'url' => true,
        'has_custom_certificate' => true,
        'pending_update_count' => true,
        'ip_address' => true,
        'last_error_date' => true,
        'last_error_message' => true,
        'last_synchronization_error_date' => true,
        'max_connections' => true,
        'allowed_updates' => true
    ];

    /**
     * Webhook URL, may be empty if webhook is not set up
     *
     * @var string
     */
    protected $url;

    /**
     * True, if a custom certificate was provided for webhook certificate checks
     *
     * @var bool
     */
    protected $hasCustomCertificate;

    /**
     * Number of updates awaiting delivery
     *
     * @var int
     */
    protected $pendingUpdateCount;

    /**
     * Optional. Currently used webhook IP address
     *
     * @var string|null
     */
    protected $ipAddress;

    /**
     * Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
     *
     * @var int|null
     */
    protected $lastErrorDate;

    /**
     * Optional. Error message in human-readable format for the most recent error that happened when trying to deliver
     * an update via webhook
     *
     * @var string|null
     */
    protected $lastErrorMessage;

    /**
     * Optional. Unix time of the most recent error that happened when trying to synchronize available updates
     * with Telegram datacenters
     *
     * @var int|null
     */
    protected $lastSynchronizationErrorDate;

    /**
     * Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     *
     * @var int|null
     */
    protected $maxConnections;

    /**
     * Optional. A list of update types the bot is subscribed to. Defaults to all update types
     *
     * @var array|null
     */
    protected $allowedUpdates;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return bool
     */
    public function hasCustomCertificate()
    {
        return $this->hasCustomCertificate;
    }

    /**
     * @param bool $hasCustomCertificate
     *
     * @return void
     */
    public function setHasCustomCertificate($hasCustomCertificate)
    {
        $this->hasCustomCertificate = $hasCustomCertificate;
    }

    /**
     * @param string $ipAddress
     *
     * @return void
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return null|string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @return int
     */
    public function getPendingUpdateCount()
    {
        return $this->pendingUpdateCount;
    }

    /**
     * @param int $pendingUpdateCount
     *
     * @return void
     */
    public function setPendingUpdateCount($pendingUpdateCount)
    {
        $this->pendingUpdateCount = $pendingUpdateCount;
    }

    /**
     * @return int|null
     */
    public function getLastErrorDate()
    {
        return $this->lastErrorDate;
    }

    /**
     * @param int $lastErrorDate
     *
     * @return void
     */
    public function setLastErrorDate($lastErrorDate)
    {
        $this->lastErrorDate = $lastErrorDate;
    }

    /**
     * @return null|string
     */
    public function getLastErrorMessage()
    {
        return $this->lastErrorMessage;
    }

    /**
     * @param string $lastErrorMessage
     *
     * @return void
     */
    public function setLastErrorMessage($lastErrorMessage)
    {
        $this->lastErrorMessage = $lastErrorMessage;
    }

    /**
     * @param int $lastSynchronizationErrorDate
     *
     * @return void
     */
    public function setLastSynchronizationErrorDate($lastSynchronizationErrorDate)
    {
        $this->lastSynchronizationErrorDate = $lastSynchronizationErrorDate;
    }

    /**
     * @return int|null
     */
    public function getLastSynchronizationErrorDate()
    {
        return $this->lastSynchronizationErrorDate;
    }

    /**
     * @return int|null
     */
    public function getMaxConnections()
    {
        return $this->maxConnections;
    }

    /**
     * @param int $maxConnections
     *
     * @return void
     */
    public function setMaxConnections($maxConnections)
    {
        $this->maxConnections = $maxConnections;
    }

    /**
     * @return array|null
     */
    public function getAllowedUpdates()
    {
        return $this->allowedUpdates;
    }

    /**
     * @param array $allowedUpdates
     *
     * @return void
     */
    public function setAllowedUpdates($allowedUpdates)
    {
        $this->allowedUpdates = $allowedUpdates;
    }
}
