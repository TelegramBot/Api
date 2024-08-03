<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;

abstract class ArrayOfReactionType
{
    /**
     * @param array $data
     * @return ReactionType[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse($data)
    {
        $arrayOfReactionTypes = [];
        foreach ($data as $reactionTypeData) {
            // Depending on the type of reaction, create an appropriate object
            if ($reactionTypeData['type'] === 'emoji') {
                $arrayOfReactionTypes[] = ReactionTypeEmoji::fromResponse($reactionTypeData);
            } elseif ($reactionTypeData['type'] === 'custom_emoji') {
                $arrayOfReactionTypes[] = ReactionTypeCustomEmoji::fromResponse($reactionTypeData);
            }
        }

        return $arrayOfReactionTypes;
    }
}
