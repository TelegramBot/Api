<?php
/**
 * Created by PhpStorm.
 * User: YaroslavMolchan
 * Date: 16/03/17
 * Time: 22:15
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
    protected static $requiredParams = ['inline_keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'inline_keyboard' => true,
    ];

    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     * Array of Array of InlineKeyboardButton
     *
     * @var array
     */
    protected $inlineKeyboard;

    /**
     * @param array $inlineKeyboard
     */
    public function __construct($inlineKeyboard = [])
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

    /**
     * @param array $inlineKeyboard
     *
     * @return void
     */
    public function setInlineKeyboard($inlineKeyboard)
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }
}
