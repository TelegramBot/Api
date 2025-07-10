<?php

namespace TelegramBot\Api\Types;

class OwnedGiftRegular extends OwnedGift
{
    protected static $requiredParams = ['type', 'gift', 'send_date'];

    protected static $map = [
        'type' => true,
        'gift' => Gift::class,
        'owned_gift_id' => true,
        'sender_user' => User::class,
        'send_date' => true,
        'text' => true,
        'entities' => ArrayOfMessageEntity::class,
        'is_private' => true,
        'is_saved' => true,
        'can_be_upgraded' => true,
        'was_refunded' => true,
        'convert_star_count' => true,
        'prepaid_upgrade_star_count' => true,
    ];

    protected $text;
    protected $entities;
    protected $isPrivate;
    protected $isSaved;
    protected $canBeUpgraded;
    protected $wasRefunded;
    protected $convertStarCount;
    protected $prepaidUpgradeStarCount;
    protected $type = 'regular';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
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

    public function getIsSaved()
    {
        return $this->isSaved;
    }

    public function setIsSaved($isSaved)
    {
        $this->isSaved = $isSaved;
    }

    public function getCanBeUpgraded()
    {
        return $this->canBeUpgraded;
    }

    public function setCanBeUpgraded($canBeUpgraded)
    {
        $this->canBeUpgraded = $canBeUpgraded;
    }

    public function getWasRefunded()
    {
        return $this->wasRefunded;
    }

    public function setWasRefunded($wasRefunded)
    {
        $this->wasRefunded = $wasRefunded;
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
}
