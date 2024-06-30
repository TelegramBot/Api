<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class KeyboardButtonRequestUsers
 * This object defines the criteria used to request suitable users.
 * Information about the selected users will be shared with the bot when the corresponding button is pressed.
 *
 * @package TelegramBot\Api\Types
 */
class KeyboardButtonRequestUsers extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['request_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'request_id' => true,
        'user_is_bot' => true,
        'user_is_premium' => true,
        'max_quantity' => true,
        'request_name' => true,
        'request_username' => true,
        'request_photo' => true,
    ];

    /**
     * Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique within the message
     *
     * @var int
     */
    protected $requestId;

    /**
     * Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected $userIsBot;

    /**
     * Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected $userIsPremium;

    /**
     * Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
     *
     * @var int|null
     */
    protected $maxQuantity;

    /**
     * Optional. Pass True to request the users' first and last names.
     *
     * @var bool|null
     */
    protected $requestName;

    /**
     * Optional. Pass True to request the users' usernames.
     *
     * @var bool|null
     */
    protected $requestUsername;

    /**
     * Optional. Pass True to request the users' photos.
     *
     * @var bool|null
     */
    protected $requestPhoto;

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
     * @return bool|null
     */
    public function getUserIsBot()
    {
        return $this->userIsBot;
    }

    /**
     * @param bool|null $userIsBot
     * @return void
     */
    public function setUserIsBot($userIsBot)
    {
        $this->userIsBot = $userIsBot;
    }

    /**
     * @return bool|null
     */
    public function getUserIsPremium()
    {
        return $this->userIsPremium;
    }

    /**
     * @param bool|null $userIsPremium
     * @return void
     */
    public function setUserIsPremium($userIsPremium)
    {
        $this->userIsPremium = $userIsPremium;
    }

    /**
     * @return int|null
     */
    public function getMaxQuantity()
    {
        return $this->maxQuantity;
    }

    /**
     * @param int|null $maxQuantity
     * @return void
     */
    public function setMaxQuantity($maxQuantity)
    {
        $this->maxQuantity = $maxQuantity;
    }

    /**
     * @return bool|null
     */
    public function getRequestName()
    {
        return $this->requestName;
    }

    /**
     * @param bool|null $requestName
     * @return void
     */
    public function setRequestName($requestName)
    {
        $this->requestName = $requestName;
    }

    /**
     * @return bool|null
     */
    public function getRequestUsername()
    {
        return $this->requestUsername;
    }

    /**
     * @param bool|null $requestUsername
     * @return void
     */
    public function setRequestUsername($requestUsername)
    {
        $this->requestUsername = $requestUsername;
    }

    /**
     * @return bool|null
     */
    public function getRequestPhoto()
    {
        return $this->requestPhoto;
    }

    /**
     * @param bool|null $requestPhoto
     * @return void
     */
    public function setRequestPhoto($requestPhoto)
    {
        $this->requestPhoto = $requestPhoto;
    }
}
