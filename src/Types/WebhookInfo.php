<?php
/**
 * User: boshurik
 * Date: 10.06.2020
 * Time: 19:43
 */

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class WebhookInfo extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['url', 'has_custom_certificate', 'pending_update_count'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'url' => true,
        'has_custom_certificate' => true,
        'pending_update_count' => true,
        'ip_address' => true,
        'last_error_date' => true,
        'last_error_message' => true,
        'max_connections' => true,
        'allowed_updates' => true
    ];

    /**
     * Webhook URL, may be empty if webhook is not set up
     *
     * @var string
     */
    protected string $url;

    /**
     * True, if a custom certificate was provided for webhook certificate checks
     *
     * @var bool
     */
    protected bool $hasCustomCertificate;

    /**
     * Number of updates awaiting delivery
     *
     * @var int
     */
    protected int $pendingUpdateCount;

    /**
     * Optional. Currently used webhook IP address
     *
     * @var string
     */
    protected string $ipAddress;

    /**
     * Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
     *
     * @var int
     */
    protected int $lastErrorDate;

    /**
     * Optional. Error message in human-readable format for the most recent error that happened when trying to deliver
     * an update via webhook
     *
     * @var string
     */
    protected string $lastErrorMessage;

    /**
     * Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     *
     * @var int
     */
    protected int $maxConnections;

    /**
     * Optional. A list of update types the bot is subscribed to. Defaults to all update types
     *
     * @var array
     */
    protected array $allowedUpdates;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool
     */
    public function isHasCustomCertificate(): bool
    {
        return $this->hasCustomCertificate;
    }

    /**
     * @param bool $hasCustomCertificate
     */
    public function setHasCustomCertificate(bool $hasCustomCertificate): void
    {
        $this->hasCustomCertificate = $hasCustomCertificate;
    }

    /**
     * @return int
     */
    public function getPendingUpdateCount(): int
    {
        return $this->pendingUpdateCount;
    }

    /**
     * @param int $pendingUpdateCount
     */
    public function setPendingUpdateCount(int $pendingUpdateCount): void
    {
        $this->pendingUpdateCount = $pendingUpdateCount;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return int
     */
    public function getLastErrorDate(): int
    {
        return $this->lastErrorDate;
    }

    /**
     * @param int $lastErrorDate
     */
    public function setLastErrorDate(int $lastErrorDate): void
    {
        $this->lastErrorDate = $lastErrorDate;
    }

    /**
     * @return string
     */
    public function getLastErrorMessage(): string
    {
        return $this->lastErrorMessage;
    }

    /**
     * @param string $lastErrorMessage
     */
    public function setLastErrorMessage(string $lastErrorMessage): void
    {
        $this->lastErrorMessage = $lastErrorMessage;
    }

    /**
     * @return int
     */
    public function getMaxConnections(): int
    {
        return $this->maxConnections;
    }

    /**
     * @param int $maxConnections
     */
    public function setMaxConnections(int $maxConnections): void
    {
        $this->maxConnections = $maxConnections;
    }

    /**
     * @return array
     */
    public function getAllowedUpdates(): array
    {
        return $this->allowedUpdates;
    }

    /**
     * @param array $allowedUpdates
     */
    public function setAllowedUpdates(array $allowedUpdates): void
    {
        $this->allowedUpdates = $allowedUpdates;
    }
}
