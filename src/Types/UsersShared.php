<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class UsersShared
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @package TelegramBot\Api\Types
 */
class UsersShared extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['request_id', 'users'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'request_id' => true,
        'users' => ArrayOfSharedUser::class
    ];

    /**
     * Identifier of the request
     *
     * @var int
     */
    protected $requestId;

    /**
     * Information about users shared with the bot
     * Array of \TelegramBot\Api\Types\SharedUser
     *
     * @var array
     */
    protected $users;

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
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param array $users
     * @return void
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}
