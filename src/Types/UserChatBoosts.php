<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class UserChatBoosts
 * This object represents a list of boosts added to a chat by a user.
 *
 * @package TelegramBot\Api\Types
 */
class UserChatBoosts extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['boosts'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'boosts' => ArrayOfChatBoost::class
    ];

    /**
     * The list of boosts added to the chat by the user
     *
     * @var ArrayOfChatBoost
     */
    protected $boosts;

    /**
     * @return ArrayOfChatBoost
     */
    public function getBoosts()
    {
        return $this->boosts;
    }

    /**
     * @param ArrayOfChatBoost $boosts
     */
    public function setBoosts($boosts)
    {
        $this->boosts = $boosts;
    }
}
