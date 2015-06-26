<?php

namespace tgbot\Api\Types;


/**
 * Class User
 * This object represents a Telegram user or bot.
 *
 * @package tgbot\Api\Types
 */
class User
{
    /**
     * Unique identifier for this user or bot
     *
     * @var int
     */
    protected $id;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    protected $first_name;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string
     */
    protected $last_name;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string
     */
    protected $username;
}