<?php

namespace TelegramBot\Api\Collection;

interface CollectionItemInterface
{
    public function toJson(bool $inner = false);
}
