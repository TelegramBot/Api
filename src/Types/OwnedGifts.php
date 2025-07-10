<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class OwnedGifts extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['total_count', 'gifts'];

    protected static $map = [
        'total_count' => true,
        'gifts' => ArrayOfOwnedGift::class,
        'next_offset' => true,
    ];

    protected $totalCount;
    protected $gifts;
    protected $nextOffset;

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    public function getGifts()
    {
        return $this->gifts;
    }

    public function setGifts($gifts)
    {
        $this->gifts = $gifts;
    }

    public function getNextOffset()
    {
        return $this->nextOffset;
    }

    public function setNextOffset($nextOffset)
    {
        $this->nextOffset = $nextOffset;
    }
}
