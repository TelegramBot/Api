<?php

namespace TelegramBot\Api\Types\Payments;

abstract class ArrayOfLabeledPrice
{
    /**
     * @param array $data
     * @return LabeledPrice[]
     */
    public static function fromResponse($data)
    {
        $arrayOfLabeledPrice = [];
        foreach ($data as $labeledPrice) {
            $arrayOfLabeledPrice[] = LabeledPrice::fromResponse($labeledPrice);
        }

        return $arrayOfLabeledPrice;
    }
}
