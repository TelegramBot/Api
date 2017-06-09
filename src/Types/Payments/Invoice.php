<?php

namespace TelegramBot\Api\Types\Payments;

use TelegramBot\Api\BaseType;

/**
 * Class Invoice
 * This object contains basic information about an invoice.
 *
 * @package TelegramBot\Api\Types\Payments
 */
class Invoice extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = ['title', 'description', 'start_parameter', 'currency', 'total_amount'];

    /**
     * @var array
     */
    static protected $map = [
        'title' => true,
        'description' => true,
        'start_parameter' => true,
        'currency' => true,
        'total_amount' => true,
    ];

    /**
     * Product name
     *
     * @var string
     */
    protected $title;

    /**
     * Product description
     *
     * @var string
     */
    protected $description;

    /**
     * Unique bot deep-linking parameter that can be used to generate this invoice
     *
     * @var string
     */
    protected $startParameter;

    /**
     * Three-letter ISO 4217 currency code
     *
     * @var string
     */
    protected $currency;

    /**
     * Total price in the smallest units of the currency
     *
     * @var integer
     */
    protected $totalAmount;

    /**
     * @author MY
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @author MY
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @author MY
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @author MY
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @author MY
     * @return string
     */
    public function getStartParameter()
    {
        return $this->startParameter;
    }

    /**
     * @author MY
     * @param string $startParameter
     */
    public function setStartParameter($startParameter)
    {
        $this->startParameter = $startParameter;
    }

    /**
     * @author MY
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @author MY
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @author MY
     * @return int
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @author MY
     * @param int $totalAmount
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }
}
