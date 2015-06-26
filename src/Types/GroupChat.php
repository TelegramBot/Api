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
}