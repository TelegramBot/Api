<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

class AcceptedGiftTypes extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['unlimited_gifts', 'limited_gifts', 'unique_gifts', 'premium_subscription'];

    protected static $map = [
        'unlimited_gifts' => true,
        'limited_gifts' => true,
        'unique_gifts' => true,
        'premium_subscription' => true,
    ];

    protected $unlimitedGifts;
    protected $limitedGifts;
    protected $uniqueGifts;
    protected $premiumSubscription;

    public function getUnlimitedGifts()
    {
        return $this->unlimitedGifts;
    }

    public function setUnlimitedGifts($unlimitedGifts)
    {
        $this->unlimitedGifts = $unlimitedGifts;
    }

    public function getLimitedGifts()
    {
        return $this->limitedGifts;
    }

    public function setLimitedGifts($limitedGifts)
    {
        $this->limitedGifts = $limitedGifts;
    }

    public function getUniqueGifts()
    {
        return $this->uniqueGifts;
    }

    public function setUniqueGifts($uniqueGifts)
    {
        $this->uniqueGifts = $uniqueGifts;
    }

    public function getPremiumSubscription()
    {
        return $this->premiumSubscription;
    }

    public function setPremiumSubscription($premiumSubscription)
    {
        $this->premiumSubscription = $premiumSubscription;
    }
}
