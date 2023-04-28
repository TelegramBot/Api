<?php

namespace TelegramBot\Api\Types\Payments;

use TelegramBot\Api\BaseType;

/**
 * Class LabeledPrice
 * This object represents a portion of the price for goods or services.
 *
 * @package TelegramBot\Api\Types\Payments
 */
class LabeledPrice extends BaseType
{
    /**
     * @var array
     */
    protected static $requiredParams = ['label', 'amount'];

    /**
     * @var array
     */
    protected static $map = [
        'label' => true,
        'amount' => true
    ];

    /**
     * Portion label
     *
     * @var string
     */
    protected $label;

    /**
     * Price of the product in the smallest units of the currency (integer, not float/double).
     *
     * @var int
     */
    protected $amount;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return void
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return void
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
