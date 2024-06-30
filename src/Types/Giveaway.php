<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Giveaway
 * This object represents a message about a scheduled giveaway.
 *
 * @package TelegramBot\Api\Types
 */
class Giveaway extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['chats', 'winners_selection_date', 'winner_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chats' => ArrayOfChat::class,
        'winners_selection_date' => true,
        'winner_count' => true,
        'only_new_members' => true,
        'has_public_winners' => true,
        'prize_description' => true,
        'country_codes' => true,
        'premium_subscription_month_count' => true,
    ];

    /**
     * The list of chats which the user must join to participate in the giveaway
     *
     * @var array
     */
    protected $chats;

    /**
     * Point in time (Unix timestamp) when winners of the giveaway will be selected
     *
     * @var int
     */
    protected $winnersSelectionDate;

    /**
     * The number of users which are supposed to be selected as winners of the giveaway
     *
     * @var int
     */
    protected $winnerCount;

    /**
     * Optional. True, if only users who join the chats after the giveaway started should be eligible to win
     *
     * @var bool|null
     */
    protected $onlyNewMembers;

    /**
     * Optional. True, if the list of giveaway winners will be visible to everyone
     *
     * @var bool|null
     */
    protected $hasPublicWinners;

    /**
     * Optional. Description of additional giveaway prize
     *
     * @var string|null
     */
    protected $prizeDescription;

    /**
     * Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which eligible users for the giveaway must come. If empty, then all users can participate in the giveaway. Users with a phone number that was bought on Fragment can always participate in giveaways.
     *
     * @var array|null
     */
    protected $countryCodes;

    /**
     * Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
     *
     * @var int|null
     */
    protected $premiumSubscriptionMonthCount;

    /**
     * @return array
     */
    public function getChats()
    {
        return $this->chats;
    }

    /**
     * @param array $chats
     * @return void
     */
    public function setChats($chats)
    {
        $this->chats = $chats;
    }

    /**
     * @return int
     */
    public function getWinnersSelectionDate()
    {
        return $this->winnersSelectionDate;
    }

    /**
     * @param int $winnersSelectionDate
     * @return void
     */
    public function setWinnersSelectionDate($winnersSelectionDate)
    {
        $this->winnersSelectionDate = $winnersSelectionDate;
    }

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
     * @return bool|null
     */
    public function getOnlyNewMembers()
    {
        return $this->onlyNewMembers;
    }

    /**
     * @param bool|null $onlyNewMembers
     * @return void
     */
    public function setOnlyNewMembers($onlyNewMembers)
    {
        $this->onlyNewMembers = $onlyNewMembers;
    }

    /**
     * @return bool|null
     */
    public function getHasPublicWinners()
    {
        return $this->hasPublicWinners;
    }

    /**
     * @param bool|null $hasPublicWinners
     * @return void
     */
    public function setHasPublicWinners($hasPublicWinners)
    {
        $this->hasPublicWinners = $hasPublicWinners;
    }

    /**
     * @return string|null
     */
    public function getPrizeDescription()
    {
        return $this->prizeDescription;
    }

    /**
     * @param string|null $prizeDescription
     * @return void
     */
    public function setPrizeDescription($prizeDescription)
    {
        $this->prizeDescription = $prizeDescription;
    }

    /**
     * @return array|null
     */
    public function getCountryCodes()
    {
        return $this->countryCodes;
    }

    /**
     * @param array|null $countryCodes
     * @return void
     */
    public function setCountryCodes($countryCodes)
    {
        $this->countryCodes = $countryCodes;
    }

    /**
     * @return int|null
     */
    public function getPremiumSubscriptionMonthCount()
    {
        return $this->premiumSubscriptionMonthCount;
    }

    /**
     * @param int|null $premiumSubscriptionMonthCount
     * @return void
     */
    public function setPremiumSubscriptionMonthCount($premiumSubscriptionMonthCount)
    {
        $this->premiumSubscriptionMonthCount = $premiumSubscriptionMonthCount;
    }
}
