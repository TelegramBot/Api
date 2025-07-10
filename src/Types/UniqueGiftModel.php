<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class UniqueGiftModel extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['name', 'sticker', 'rarity_per_mille'];

    protected static $map = [
        'name' => true,
        'sticker' => Sticker::class,
        'rarity_per_mille' => true,
    ];

    protected $name;
    protected $sticker;
    protected $rarityPerMille;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSticker()
    {
        return $this->sticker;
    }

    public function setSticker($sticker)
    {
        $this->sticker = $sticker;
    }

    public function getRarityPerMille()
    {
        return $this->rarityPerMille;
    }

    public function setRarityPerMille($rarityPerMille)
    {
        $this->rarityPerMille = $rarityPerMille;
    }
}
