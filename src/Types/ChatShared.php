<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatShared
 * This object contains information about a chat that was shared with the bot using a KeyboardButtonRequestChat button.
 *
 * @package TelegramBot\Api\Types
 */
class ChatShared extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['request_id', 'chat_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'request_id' => true,
        'chat_id' => true,
        'title' => true,
        'username' => true,
        'photo' => ArrayOfPhotoSize::class,
    ];

    /**
     * Identifier of the request
     *
     * @var int
     */
    protected $requestId;

    /**
     * Identifier of the shared chat
     *
     * @var int
     */
    protected $chatId;

    /**
     * Optional. Title of the chat
     *
     * @var string|null
     */
    protected $title;

    /**
     * Optional. Username of the chat
     *
     * @var string|null
     */
    protected $username;

    /**
     * Optional. Available sizes of the chat photo
     * Array of \TelegramBot\Api\Types\PhotoSize
     *
     * @var array|null
     */
    protected $photo;

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
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * @param int $chatId
     * @return void
     */
    public function setChatId($chatId)
    {
        $this->chatId = $chatId;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
