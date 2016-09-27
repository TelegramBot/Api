<?php
/**
 * Created by PhpStorm.
 * User: iGusev
 * Date: 14/04/16
 * Time: 23:48
 */

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;

class InlineKeyboardMarkup extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['inline_keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'inline_keyboard' => true,
    ];

    /**
     * @var array
     */
    protected $inlineKeyboard;

    public function __construct($inlineKeyboard)
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }

    /**
     * @param array $inlineKeyboard
     */
    public function setInlineKeyboard($inlineKeyboard)
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }

    /**
     * @return array
     */
    public function getInlineKeyboard()
    {
        return $this->inlineKeyboard;
    }
}
