<?php

namespace TelegramBot\Api\Types;

class ArrayOfBusinessOpeningHoursInterval
{
    /**
     * @param array $data
     * @return BusinessOpeningHoursInterval[]
     */
    public static function fromResponse($data)
    {
        $array = [];
        foreach ($data as $datum) {
            $array[] = BusinessOpeningHoursInterval::fromResponse($datum);
        }

        return $array;
    }
}
