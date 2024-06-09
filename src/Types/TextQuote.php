<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class TextQuote
 * This object contains information about the quoted part of a message that is replied to by the given message.
 *
 * @package TelegramBot\Api\Types
 */
class TextQuote extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['text', 'position'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'text' => true,
        'entities' => ArrayOfMessageEntity::class,
        'position' => true,
        'is_manual' => true,
    ];

    /**
     * Text of the quoted part of a message that is replied to by the given message
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough,
     * spoiler, and custom_emoji entities are kept in quotes.
     *
     * @var array|null
     */
    protected $entities;

    /**
     * Approximate quote position in the original message in UTF-16 code units as specified by the sender
     *
     * @var int
     */
    protected $position;

    /**
     * Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added automatically by the server.
     *
     * @var bool|null
     */
    protected $isManual;

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
     * @return array|null
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param array|null $entities
     * @return void
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return bool|null
     */
    public function getIsManual()
    {
        return $this->isManual;
    }

    /**
     * @param bool|null $isManual
     * @return void
     */
    public function setIsManual($isManual)
    {
        $this->isManual = $isManual;
    }
}
