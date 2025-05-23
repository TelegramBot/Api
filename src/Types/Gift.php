<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class Gift
 * This object represents a gift that can be sent by the bot.
 */
class Gift extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['id', 'sticker', 'star_count'];

    protected static $map = [
        'id' => true,
        'sticker' => Sticker::class,
        'star_count' => true,
        'upgrade_star_count' => true,
        'total_count' => true,
        'remaining_count' => true,
    ];

    protected $id;
    protected $sticker;
    protected $starCount;
    protected $upgradeStarCount;
    protected $totalCount;
    protected $remainingCount;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSticker()
    {
        return $this->sticker;
    }

    public function setSticker($sticker)
    {
        $this->sticker = $sticker;
    }

    public function getStarCount()
    {
        return $this->starCount;
    }

    public function setStarCount($starCount)
    {
        $this->starCount = $starCount;
    }

    public function getUpgradeStarCount()
    {
        return $this->upgradeStarCount;
    }

    public function setUpgradeStarCount($upgradeStarCount)
    {
        $this->upgradeStarCount = $upgradeStarCount;
    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    public function getRemainingCount()
    {
        return $this->remainingCount;
    }

    public function setRemainingCount($remainingCount)
    {
        $this->remainingCount = $remainingCount;
    }
}
