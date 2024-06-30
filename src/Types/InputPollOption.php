<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class InputPollOption
 * This object contains information about one answer option in a poll to send.
 *
 * @package TelegramBot\Api\Types
 */
class InputPollOption extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'text' => true,
        'text_parse_mode' => true,
        'text_entities' => ArrayOfMessageEntity::class
    ];

    /**
     * Option text, 1-100 characters
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. Mode for parsing entities in the text. Currently, only custom emoji entities are allowed
     *
     * @var string|null
     */
    protected $textParseMode;

    /**
     * Optional. A JSON-serialized list of special entities that appear in the poll option text
     *
     * @var array|null
     */
    protected $textEntities;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string|null
     */
    public function getTextParseMode()
    {
        return $this->textParseMode;
    }

    /**
     * @param string|null $textParseMode
     * @return void
     */
    public function setTextParseMode($textParseMode)
    {
        $this->textParseMode = $textParseMode;
    }

    /**
     * @return array|null
     */
    public function getTextEntities()
    {
        return $this->textEntities;
    }

    /**
     * @param array|null $textEntities
     * @return void
     */
    public function setTextEntities($textEntities)
    {
        $this->textEntities = $textEntities;
    }
}
