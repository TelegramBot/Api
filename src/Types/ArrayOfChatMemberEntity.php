<?php

namespace TelegramBot\Api\Types;

abstract class ArrayOfChatMemberEntity
{
    /**
     * @param array $data
     * @return ChatMember[]
     */
    public static function fromResponse($data)
    {
        $arrayOfChatMemberEntity = [];
        foreach ($data as $chatMemberEntity) {
            $arrayOfChatMemberEntity[] = ChatMember::fromResponse($chatMemberEntity);
        }

        return $arrayOfChatMemberEntity;
    }
}
