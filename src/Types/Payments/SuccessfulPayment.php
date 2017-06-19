<?php

namespace TelegramBot\Api\Types\Payments;

use TelegramBot\Api\BaseType;

/**
 * Class SuccessfulPayment
 * This object contains basic information about a successful payment.
 *
 * @package TelegramBot\Api\Types\Payments
 */
class SuccessfulPayment extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = [
        'currency',
        'total_amount',
        'invoice_payload',
        'telegram_payment_charge_id',
        'provider_payment_charge_id'
    ];

    /**
     * @var array
     */
    static protected $map = [
        'currency' => true,
        'total_amount' => true,
        'invoice_payload' => true,
        'shipping_option_id' => true,
        'order_info' => OrderInfo::class,
        'telegram_payment_charge_id' => true,
        'provider_payment_charge_id' => true
    ];

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
     * @var array
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
     * Telegram payment identifier
     *
     * @var string
     */
    protected $telegramPaymentChargeId;

    /**
     * Provider payment identifier
     *
     * @var string
     */
    protected $providerPaymentChargeId;

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
     * @return array
     */
    public function getInvoicePayload()
    {
        return $this->invoicePayload;
    }

    /**
     * @author MY
     * @param array $invoicePayload
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
     * @return string
     */
    public function getTelegramPaymentChargeId()
    {
        return $this->telegramPaymentChargeId;
    }

    /**
     * @author MY
     * @param string $telegramPaymentChargeId
     */
    public function setTelegramPaymentChargeId($telegramPaymentChargeId)
    {
        $this->telegramPaymentChargeId = $telegramPaymentChargeId;
    }

    /**
     * @author MY
     * @return mixed
     */
    public function getProviderPaymentChargeId()
    {
        return $this->providerPaymentChargeId;
    }

    /**
     * @author MY
     * @param mixed $providerPaymentChargeId
     */
    public function setProviderPaymentChargeId($providerPaymentChargeId)
    {
        $this->providerPaymentChargeId = $providerPaymentChargeId;
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
