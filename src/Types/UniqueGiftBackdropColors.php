<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class UniqueGiftBackdropColors extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['center_color', 'edge_color', 'symbol_color', 'text_color'];

    protected static $map = [
        'center_color' => true,
        'edge_color' => true,
        'symbol_color' => true,
        'text_color' => true,
    ];

    protected $centerColor;
    protected $edgeColor;
    protected $symbolColor;
    protected $textColor;

    public function getCenterColor()
    {
        return $this->centerColor;
    }

    public function setCenterColor($centerColor)
    {
        $this->centerColor = $centerColor;
    }

    public function getEdgeColor()
    {
        return $this->edgeColor;
    }

    public function setEdgeColor($edgeColor)
    {
        $this->edgeColor = $edgeColor;
    }

    public function getSymbolColor()
    {
        return $this->symbolColor;
    }

    public function setSymbolColor($symbolColor)
    {
        $this->symbolColor = $symbolColor;
    }

    public function getTextColor()
    {
        return $this->textColor;
    }

    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
    }
}
