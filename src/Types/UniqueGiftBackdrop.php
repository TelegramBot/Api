<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class UniqueGiftBackdrop extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['name', 'colors', 'rarity_per_mille'];

    protected static $map = [
        'name' => true,
        'colors' => UniqueGiftBackdropColors::class,
        'rarity_per_mille' => true,
    ];

    protected $name;
    protected $colors;
    protected $rarityPerMille;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getColors()
    {
        return $this->colors;
    }

    public function setColors($colors)
    {
        $this->colors = $colors;
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
