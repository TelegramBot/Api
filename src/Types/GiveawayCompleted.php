<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class GiveawayCompleted
 * This object represents a service message about the completion of a giveaway without public winners.
 *
 * @package TelegramBot\Api\Types
 */
class GiveawayCompleted extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['winner_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'winner_count' => true,
        'unclaimed_prize_count' => true,
        'giveaway_message' => MaybeInaccessibleMessage::class,
    ];

    /**
     * Number of winners in the giveaway
     *
     * @var int
     */
    protected $winnerCount;

    /**
     * Optional. Number of undistributed prizes
     *
     * @var int|null
     */
    protected $unclaimedPrizeCount;

    /**
     * Optional. Message with the giveaway that was completed, if it wasn't deleted
     *
     * @var MaybeInaccessibleMessage|null
     */
    protected $giveawayMessage;

    /**
     * @return int
     */
    public function getWinnerCount()
    {
        return $this->winnerCount;
    }

    /**
     * @param int $winnerCount
     * @return void
     */
    public function setWinnerCount($winnerCount)
    {
        $this->winnerCount = $winnerCount;
    }

    /**
     * @return int|null
     */
    public function getUnclaimedPrizeCount()
    {
        return $this->unclaimedPrizeCount;
    }

    /**
     * @param int|null $unclaimedPrizeCount
     * @return void
     */
    public function setUnclaimedPrizeCount($unclaimedPrizeCount)
    {
        $this->unclaimedPrizeCount = $unclaimedPrizeCount;
    }

    /**
     * @return MaybeInaccessibleMessage|null
     */
    public function getGiveawayMessage()
    {
        return $this->giveawayMessage;
    }

    /**
     * @param MaybeInaccessibleMessage|null $giveawayMessage
     * @return void
     */
    public function setGiveawayMessage($giveawayMessage)
    {
        $this->giveawayMessage = $giveawayMessage;
    }
}
