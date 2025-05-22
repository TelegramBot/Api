<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class CopyTextButton
 * Represents an inline keyboard button that copies specified text to the clipboard.
 */
class CopyTextButton extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['text'];

    protected static $map = [
        'text' => true
    ];

    protected $text;

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
}
