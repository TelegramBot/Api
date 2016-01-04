<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;

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
     * @var string
     */
    protected $title;

    /**
     * Text of the message to be sent
     * Optional for photo, gif, mpeg4_gif, video
     *
     * @var string
     */
    protected $messageText;

    /**
     * Optional. Send “Markdown”, if you want Telegram apps to show bold, italic and inline URLs in your bot's message.
     *
     * @var string
     */
    protected $parseMode;

    /**
     * Optional. Disables link previews for links in the sent message
     *
     * @var bool
     */
    protected $disableWebPagePreview;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
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
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMessageText()
    {
        return $this->messageText;
    }

    /**
     * @param string $messageText
     */
    public function setMessageText($messageText)
    {
        $this->messageText = $messageText;
    }

    /**
     * @return string
     */
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * @param string $parseMode
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return boolean
     */
    public function isDisableWebPagePreview()
    {
        return $this->disableWebPagePreview;
    }

    /**
     * @param boolean $disableWebPagePreview
     */
    public function setDisableWebPagePreview($disableWebPagePreview)
    {
        $this->disableWebPagePreview = $disableWebPagePreview;
    }
}