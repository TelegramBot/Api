<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class InputFile
 * Represents the contents of a file to be uploaded.
 */
class InputFile extends BaseType implements TypeInterface
{
    protected static $requiredParams = [];

    protected static $map = [
        'file' => true
    ];

    protected $file;

    public function __construct($file = null)
    {
        if ($file !== null) {
            $this->file = $file;
        }
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
}
