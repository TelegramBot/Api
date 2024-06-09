<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatBoostAdded
 * This object represents a service message about a user boosting a chat.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoostAdded extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['boost_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'boost_count' => true,
    ];

    /**
     * Number of boosts added by the user
     *
     * @var int
     */
    protected $boostCount;

    /**
     * @return int
     */
    public function getBoostCount()
    {
        return $this->boostCount;
    }

    /**
     * @param int $boostCount
     * @return void
     */
    public function setBoostCount($boostCount)
    {
        $this->boostCount = $boostCount;
    }
}
