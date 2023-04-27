<?php

namespace TelegramBot\Api\Collection;

interface CollectionItemInterface
{
    /**
     * @param bool $inner
     * @return array|string
     */
    public function toJson($inner = false);
}
