<?php

namespace TelegramBot\Api\Types;

/**
 * Class ChatBoostSourceGiveaway
 * This object represents a chat boost obtained by the creation of a Telegram Premium giveaway.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['source', 'giveaway_message_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'source' => true,
        'giveaway_message_id' => true,
        'user' => User::class,
        'is_unclaimed' => true
    ];

    public static function fromResponse($data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * Source of the boost, always “giveaway”
     *
     * @var string
     */
    protected $source = 'giveaway';

    /**
     * Identifier of a message in the chat with the giveaway
     *
     * @var int|null
     */
    protected $giveawayMessageId;

    /**
     * Optional. User that won the prize in the giveaway if any
     *
     * @var User|null
     */
    protected $user;

    /**
     * Optional. True, if the giveaway was completed, but there was no user to win the prize
     *
     * @var bool|null
     */
    protected $isUnclaimed;

    /**
     * @return int|null
     */
    public function getGiveawayMessageId(): ?int
    {
        return $this->giveawayMessageId;
    }

    /**
     * @param int|null $giveawayMessageId
     * @return void
     */
    public function setGiveawayMessageId(?int $giveawayMessageId): void
    {
        $this->giveawayMessageId = $giveawayMessageId;
    }

    /**
     * @return bool|null
     */
    public function getIsUnclaimed(): ?bool
    {
        return $this->isUnclaimed;
    }

    /**
     * @param bool|null $isUnclaimed
     * @return void
     */
    public function setIsUnclaimed(?bool $isUnclaimed): void
    {
        $this->isUnclaimed = $isUnclaimed;
    }
}





