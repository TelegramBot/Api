<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class GiveawayWinners
 * This object represents a message about the completion of a giveaway with public winners.
 *
 * @package TelegramBot\Api\Types
 */
class GiveawayWinners extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = [
        'chat',
        'giveaway_message_id',
        'winners_selection_date',
        'winner_count',
        'winners'
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'chat' => Chat::class,
        'giveaway_message_id' => true,
        'winners_selection_date' => true,
        'winner_count' => true,
        'winners' => ArrayOfUser::class,
        'additional_chat_count' => true,
        'premium_subscription_month_count' => true,
        'unclaimed_prize_count' => true,
        'only_new_members' => true,
        'was_refunded' => true,
        'prize_description' => true,
    ];

    /**
     * The chat that created the giveaway
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Identifier of the message with the giveaway in the chat
     *
     * @var int
     */
    protected $giveawayMessageId;

    /**
     * Point in time (Unix timestamp) when winners of the giveaway were selected
     *
     * @var int
     */
    protected $winnersSelectionDate;

    /**
     * Total number of winners in the giveaway
     *
     * @var int
     */
    protected $winnerCount;

    /**
     * List of up to 100 winners of the giveaway
     *
     * @var array
     */
    protected $winners;

    /**
     * Optional. The number of other chats the user had to join in order to be eligible for the giveaway
     *
     * @var int|null
     */
    protected $additionalChatCount;

    /**
     * Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
     *
     * @var int|null
     */
    protected $premiumSubscriptionMonthCount;

    /**
     * Optional. Number of undistributed prizes
     *
     * @var int|null
     */
    protected $unclaimedPrizeCount;

    /**
     * Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
     *
     * @var bool|null
     */
    protected $onlyNewMembers;

    /**
     * Optional. True, if the giveaway was canceled because the payment for it was refunded
     *
     * @var bool|null
     */
    protected $wasRefunded;

    /**
     * Optional. Description of additional giveaway prize
     *
     * @var string|null
     */
    protected $prizeDescription;

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getGiveawayMessageId()
    {
        return $this->giveawayMessageId;
    }

    /**
     * @param int $giveawayMessageId
     * @return void
     */
    public function setGiveawayMessageId($giveawayMessageId)
    {
        $this->giveawayMessageId = $giveawayMessageId;
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
     * @return array
     */
    public function getWinners()
    {
        return $this->winners;
    }

    /**
     * @param array $winners
     * @return void
     */
    public function setWinners($winners)
    {
        $this->winners = $winners;
    }

    /**
     * @return int|null
     */
    public function getAdditionalChatCount()
    {
        return $this->additionalChatCount;
    }

    /**
     * @param int|null $additionalChatCount
     * @return void
     */
    public function setAdditionalChatCount($additionalChatCount)
    {
        $this->additionalChatCount = $additionalChatCount;
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
    public function getWasRefunded()
    {
        return $this->wasRefunded;
    }

    /**
     * @param bool|null $wasRefunded
     * @return void
     */
    public function setWasRefunded($wasRefunded)
    {
        $this->wasRefunded = $wasRefunded;
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
}
