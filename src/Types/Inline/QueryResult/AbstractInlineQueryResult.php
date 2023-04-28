<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class AbstractInlineQueryResult
 * Abstract class for representing one result of an inline query
 *
 * @package TelegramBot\Api\Types
 */
class AbstractInlineQueryResult extends BaseType
{
    /**
     * Type of the result, must be one of: article, photo, gif, mpeg4_gif, video
     *
     * @var string
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @var string
     */
    protected $id;

    /**
     * Title for the result
     *
     * @var string|null
     */
    protected $title;

    /**
     * Content of the message to be sent instead of the file
     *
     * @var InputMessageContent|null
     */
    protected $inputMessageContent;

    /**
     * Optional. Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    protected $replyMarkup;

    /**
     * AbstractInlineQueryResult constructor.
     *
     * @param string $id
     * @param string|null $title
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $replyMarkup
     */
    public function __construct($id, $title = null, $inputMessageContent = null, $replyMarkup = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->inputMessageContent = $inputMessageContent;
        $this->replyMarkup = $replyMarkup;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return InputMessageContent|null
     */
    public function getInputMessageContent()
    {
        return $this->inputMessageContent;
    }

    /**
     * @param InputMessageContent|null $inputMessageContent
     *
     * @return void
     */
    public function setInputMessageContent($inputMessageContent)
    {
        $this->inputMessageContent = $inputMessageContent;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup()
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return void
     */
    public function setReplyMarkup($replyMarkup)
    {
        $this->replyMarkup = $replyMarkup;
    }
}
