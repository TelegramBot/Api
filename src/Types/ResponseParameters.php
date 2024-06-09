<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ResponseParameters
 * Describes why a request was unsuccessful.
 *
 * @package TelegramBot\Api\Types
 */
class ResponseParameters extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = [];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'migrate_to_chat_id' => true,
        'retry_after' => true
    ];

    /**
     * The group has been migrated to a supergroup with the specified identifier
     *
     * @var int|null
     */
    protected $migrateToChatId;

    /**
     * In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     *
     * @var int|null
     */
    protected $retryAfter;

    /**
     * @return int|null
     */
    public function getMigrateToChatId()
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int|null $migrateToChatId
     */
    public function setMigrateToChatId($migrateToChatId)
    {
        $this->migrateToChatId = $migrateToChatId;
    }

    /**
     * @return int|null
     */
    public function getRetryAfter()
    {
        return $this->retryAfter;
    }

    /**
     * @param int|null $retryAfter
     */
    public function setRetryAfter($retryAfter)
    {
        $this->retryAfter = $retryAfter;
    }
}
