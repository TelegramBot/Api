<?php

namespace TelegramBot\Api\Types\Payments\Query;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\Payments\ArrayOfLabeledPrice;
use TelegramBot\Api\Types\Payments\OrderInfo;
use TelegramBot\Api\Types\Payments\ShippingAddress;
use TelegramBot\Api\Types\User;

/**
 * Class PreCheckoutQuery
 * This object contains information about an incoming pre-checkout query.
 *
 * @package TelegramBot\Api\Types\Payments\Query
 */
class PreCheckoutQuery extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = ['id', 'from', 'currency', 'total_amount', 'invoice_payload'];

    /**
     * @var array
     */
    static protected $map = [
        'id' => true,
        'from' => User::class,
        'currency' => true,
        'total_amount' => true,
        'invoice_payload' => true,
        'shipping_option_id' => true,
        'order_info' => OrderInfo::class
    ];

    /**
     * Unique query identifier
     *
     * @var string
     */
    protected $id;

    /**
     * User who sent the query
     *
     * @var User
     */
    protected $from;

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
     * Bot specified invoice payload
     *
     * @var string
     */
    protected $invoicePayload;

    /**
     * Optional. Identifier of the shipping option chosen by the user
     *
     * @var string
     */
    protected $shippingOptionId;

    /**
     * Optional. Order info provided by the user
     *
     * @var OrderInfo
     */
    protected $orderInfo;

    /**
     * @author MY
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @author MY
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @author MY
     * @return User
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @author MY
     * @param User $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
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

    /**
     * @author MY
     * @return mixed
     */
    public function getInvoicePayload()
    {
        return $this->invoicePayload;
    }

    /**
     * @author MY
     * @param mixed $invoicePayload
     */
    public function setInvoicePayload($invoicePayload)
    {
        $this->invoicePayload = $invoicePayload;
    }

    /**
     * @author MY
     * @return string
     */
    public function getShippingOptionId()
    {
        return $this->shippingOptionId;
    }

    /**
     * @author MY
     * @param string $shippingOptionId
     */
    public function setShippingOptionId($shippingOptionId)
    {
        $this->shippingOptionId = $shippingOptionId;
    }

    /**
     * @author MY
     * @return OrderInfo
     */
    public function getOrderInfo()
    {
        return $this->orderInfo;
    }

    /**
     * @author MY
     * @param OrderInfo $orderInfo
     */
    public function setOrderInfo($orderInfo)
    {
        $this->orderInfo = $orderInfo;
    }
}
