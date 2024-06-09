<?php

namespace TelegramBot\Api\Types;

class ChatMemberOwner extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['status', 'user', 'is_anonymous'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'status' => true,
        'user' => User::class,
        'is_anonymous' => true,
        'custom_title' => true,
    ];

    /**
     * True, if the user's presence in the chat is hidden
     *
     * @var bool
     */
    protected $isAnonymous;

    /**
     * Optional. Custom title for this user
     *
     * @var string|null
     */
    protected $customTitle;

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return bool
     */
    public function isAnonymous()
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $isAnonymous
     * @return void
     */
    public function setIsAnonymous($isAnonymous)
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle()
    {
        return $this->customTitle;
    }

    /**
     * @param string|null $customTitle
     * @return void
     */
    public function setCustomTitle($customTitle)
    {
        $this->customTitle = $customTitle;
    }
}
