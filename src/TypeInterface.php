<?php

namespace TelegramBot\Api;

interface TypeInterface
{
    /**
     * @param array $data
     * @return static
     */
    public static function fromResponse($data);
}
