<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\Collection\Collection;
use TelegramBot\Api\TypeInterface;

final class ArrayOfBotCommand extends Collection implements TypeInterface
{
    public static function fromResponse($data)
    {
        $arrayOfBotCommand = new self();
        foreach ($data as $botCommand) {
            $arrayOfBotCommand->addItem(BotCommand::fromResponse($botCommand));
        }

        return $arrayOfBotCommand;
    }
}
