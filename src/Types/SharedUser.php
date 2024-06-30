<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class SharedUser
 * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @package TelegramBot\Api\Types
 */
class SharedUser extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['user_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'user_id' => true,
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'photo' => ArrayOfPhotoSize::class
    ];

    /**
     * Identifier of the shared user
     *
     * @var int
     */
    protected $userId;

    /**
     * Optional. First name of the user, if the name was requested by the bot
     *
     * @var string|null
     */
    protected $firstName;

    /**
     * Optional. Last name of the user, if the name was requested by the bot
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Optional. Username of the user, if the username was requested by the bot
     *
     * @var string|null
     */
    protected $username;

    /**
     * Optional. Available sizes of the chat photo, if the photo was requested by the bot
     *
     * @var array|null
     */
    protected $photo;

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

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return array|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param array|null $photo
     * @return void
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
}
