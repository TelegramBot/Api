<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class UniqueGiftInfo extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['gift', 'origin'];

    protected static $map = [
        'gift' => UniqueGift::class,
        'origin' => true,
        'owned_gift_id' => true,
        'transfer_star_count' => true,
    ];

    protected $gift;
    protected $origin;
    protected $ownedGiftId;
    protected $transferStarCount;

    public function getGift()
    {
        return $this->gift;
    }

    public function setGift($gift)
    {
        $this->gift = $gift;
    }

    public function getOrigin()
    {
        return $this->origin;
    }

    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    public function getOwnedGiftId()
    {
        return $this->ownedGiftId;
    }

    public function setOwnedGiftId($ownedGiftId)
    {
        $this->ownedGiftId = $ownedGiftId;
    }

    public function getTransferStarCount()
    {
        return $this->transferStarCount;
    }

    public function setTransferStarCount($transferStarCount)
    {
        $this->transferStarCount = $transferStarCount;
    }
}
