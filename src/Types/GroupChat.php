<?php

namespace tgbot\Api\Types;

/**
 * Class GroupChat
 * This object represents a group chat.
 *
 * @package tgbot\Api\Types
 */
class GroupChat
{
    /**
     * Unique identifier for this group chat
     *
     * @var int
     */
    protected $id;

    /**
     *Group name
     *
     * @var string
     */
    protected $title;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
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