<?php


namespace TelegramBot\Api\Types;


use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class OldChatMember extends BaseType implements TypeInterface
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $untilDate;

    /**
     * @var array
     */
    static protected $map = [
        'user' => User::class,
        'status' => true,
        'until_date' => true,
    ];

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getUntilDate()
    {
        return $this->untilDate;
    }

    /**
     * @param string $untilDate
     */
    public function setUntilDate($untilDate)
    {
        $this->untilDate = $untilDate;
    }
}
