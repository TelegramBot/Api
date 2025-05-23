<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

class StarAmount extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['amount'];

    protected static $map = [
        'amount' => true,
        'nanostar_amount' => true,
    ];

    protected $amount;
    protected $nanostarAmount;

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getNanostarAmount()
    {
        return $this->nanostarAmount;
    }

    public function setNanostarAmount($nanostarAmount)
    {
        $this->nanostarAmount = $nanostarAmount;
    }
}
