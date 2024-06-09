<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class ReactionCount extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'total_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => ReactionType::class,
        'total_count' => true,
    ];

    /**
     * Type of the reaction
     *
     * @var ReactionType
     */
    protected $type;

    /**
     * Number of times the reaction was added
     *
     * @var int
     */
    protected $totalCount;

    /**
     * @return ReactionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param ReactionType $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     * @return void
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }
}
