<?php

namespace TelegramBot\Api\Types\Payments;

abstract class ArrayOfLabeledPrice
{
    public static function fromResponse($data)
    {
        $arrayOfLabeledPrice = [];
        foreach ($data as $labeledPrice) {
            $arrayOfLabeledPrice[] = LabeledPrice::fromResponse($labeledPrice);
        }

        return $arrayOfLabeledPrice;
    }
}
