<?php

namespace tgbot\Api\Types;

use tgbot\Api\BaseType;
use tgbot\Api\InvalidArgumentException;
use tgbot\Api\TypeInterface;

/**
 * Class GroupChat
 * This object represents a group chat.
 *
 * @package tgbot\Api\Types
 */
class GroupChat extends BaseType implements TypeInterface
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
        if(is_numeric($id)) {
            $this->id = $id;
        }
        else {
            throw new InvalidArgumentException();
        }
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

    public static function fromResponse($data)
    {
        $instance = new self();

        if (!isset($data['id'], $data['title'])) {
            throw new InvalidArgumentException();
        }

        $instance->setId($data['id']);
        $instance->setTitle($data['title']);

        return $instance;
    }
}