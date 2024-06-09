<?php

namespace TelegramBot\Api\Types;

/**
 * Class ChatBoostSourcePremium
 * This object represents a chat boost obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoostSourcePremium extends ChatBoostSource
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['source', 'user'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'source' => true,
        'user' => User::class
    ];

    /**
     * Source of the boost, always “premium”
     *
     * @var string
     */
    protected $source = 'premium';

    /**
     * User that boosted the chat
     *
     * @var User
     */
    protected $user;

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source): void
    {
        $this->source = $source;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }
}
