<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class PaidMessagePriceChanged
 * Describes a service message about a change in the price of paid messages.
 */
class PaidMessagePriceChanged extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['paid_message_star_count'];

    protected static $map = [
        'paid_message_star_count' => true
    ];

    protected $paidMessageStarCount;

    public function getPaidMessageStarCount()
    {
        return $this->paidMessageStarCount;
    }

    public function setPaidMessageStarCount($count)
    {
        $this->paidMessageStarCount = $count;
    }
}
