<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class ChosenInlineResult
 * This object represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @package TelegramBot\Api\Types
 */
class ChosenInlineResult extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['result_id', 'from', 'query'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'result_id' => true,
        'from' => User::class,
        'query' => true,
    ];

    /**
     * The unique identifier for the result that was chosen.
     *
     * @var string
     */
    protected $resultId;

    /**
     * The user that chose the result.
     *
     * @var User
     */
    protected $from;

    /**
     * The query that was used to obtain the result.
     *
     * @var string
     */
    protected $query;

}
