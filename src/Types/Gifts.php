<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

class Gifts extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['gifts'];

    protected static $map = [
        'gifts' => ArrayOfGift::class,
    ];

    protected $gifts;

    public function getGifts()
    {
        return $this->gifts;
    }

    public function setGifts($gifts)
    {
        $this->gifts = $gifts;
    }
}
