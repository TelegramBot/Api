<?php

namespace TelegramBot\Api\Types;

class ChatMemberBanned extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['status', 'user', 'until_date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'status' => true,
        'user' => User::class,
        'until_date' => true,
    ];

    /**
     * Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
     *
     * @var int
     */
    protected $untilDate;

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return int
     */
    public function getUntilDate()
    {
        return $this->untilDate;
    }

    /**
     * @param int $untilDate
     * @return void
     */
    public function setUntilDate($untilDate)
    {
        $this->untilDate = $untilDate;
    }
}
