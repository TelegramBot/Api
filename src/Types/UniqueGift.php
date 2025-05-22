<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

class UniqueGift extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['base_name', 'name', 'number', 'model', 'symbol', 'backdrop'];

    protected static $map = [
        'base_name' => true,
        'name' => true,
        'number' => true,
        'model' => UniqueGiftModel::class,
        'symbol' => UniqueGiftSymbol::class,
        'backdrop' => UniqueGiftBackdrop::class,
    ];

    protected $baseName;
    protected $name;
    protected $number;
    protected $model;
    protected $symbol;
    protected $backdrop;

    public function getBaseName()
    {
        return $this->baseName;
    }

    public function setBaseName($baseName)
    {
        $this->baseName = $baseName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    public function getBackdrop()
    {
        return $this->backdrop;
    }

    public function setBackdrop($backdrop)
    {
        $this->backdrop = $backdrop;
    }
}
