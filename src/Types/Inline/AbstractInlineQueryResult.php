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
}