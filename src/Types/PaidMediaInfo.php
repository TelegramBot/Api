<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;

/**
 * Class PaidMediaInfo
 * Describes the paid media added to a message.
 */
class PaidMediaInfo extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['star_count', 'paid_media'];

    protected static $map = [
        'star_count' => true,
        'paid_media' => PaidMedia::class
    ];

    protected $starCount;
    protected $paidMedia;

    public function getStarCount()
    {
        return $this->starCount;
    }

    public function setStarCount($starCount)
    {
        $this->starCount = $starCount;
    }

    public function getPaidMedia()
    {
        return $this->paidMedia;
    }

    public function setPaidMedia($paidMedia)
    {
        $this->paidMedia = $paidMedia;
    }
}
