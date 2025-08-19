<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class UserShared
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @package TelegramBot\Api\Types
 */
class UserShared extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['request_id', 'user_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'user_id' => true,
        'request_id' => true
    ];

    /**
     * Identifier of the request
     *
     * @var int
     */
    protected $requestId;

    /**
     * Identifier of the shared user
     *
     * @var int
     */
    protected $userId;

    /**
     * @return int
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param int $requestId
     * @return void
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return void
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
