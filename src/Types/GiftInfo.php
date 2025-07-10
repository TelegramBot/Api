<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class GiftInfo extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['gift'];

    protected static $map = [
        'gift' => Gift::class,
        'owned_gift_id' => true,
        'convert_star_count' => true,
        'prepaid_upgrade_star_count' => true,
        'can_be_upgraded' => true,
        'text' => true,
        'entities' => ArrayOfMessageEntity::class,
        'is_private' => true,
    ];

    protected $gift;
    protected $ownedGiftId;
    protected $convertStarCount;
    protected $prepaidUpgradeStarCount;
    protected $canBeUpgraded;
    protected $text;
    protected $entities;
    protected $isPrivate;

    public function getGift()
    {
        return $this->gift;
    }

    public function setGift($gift)
    {
        $this->gift = $gift;
    }

    public function getOwnedGiftId()
    {
        return $this->ownedGiftId;
    }

    public function setOwnedGiftId($ownedGiftId)
    {
        $this->ownedGiftId = $ownedGiftId;
    }

    public function getConvertStarCount()
    {
        return $this->convertStarCount;
    }

    public function setConvertStarCount($convertStarCount)
    {
        $this->convertStarCount = $convertStarCount;
    }

    public function getPrepaidUpgradeStarCount()
    {
        return $this->prepaidUpgradeStarCount;
    }

    public function setPrepaidUpgradeStarCount($prepaidUpgradeStarCount)
    {
        $this->prepaidUpgradeStarCount = $prepaidUpgradeStarCount;
    }

    public function getCanBeUpgraded()
    {
        return $this->canBeUpgraded;
    }

    public function setCanBeUpgraded($canBeUpgraded)
    {
        $this->canBeUpgraded = $canBeUpgraded;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getEntities()
    {
        return $this->entities;
    }

    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    public function getIsPrivate()
    {
        return $this->isPrivate;
    }

    public function setIsPrivate($isPrivate)
    {
        $this->isPrivate = $isPrivate;
    }
}
