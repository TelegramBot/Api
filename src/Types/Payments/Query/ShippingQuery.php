<?php

namespace TelegramBot\Api\Types\Payments\Query;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\Payments\ArrayOfLabeledPrice;
use TelegramBot\Api\Types\Payments\ShippingAddress;
use TelegramBot\Api\Types\User;

/**
 * Class ShippingQuery
 * This object contains information about an incoming shipping query.
 *
 * @package TelegramBot\Api\Types\Payments\Query
 */
class ShippingQuery extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = ['id', 'from', 'invoice_payload', 'shipping_address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'id' => true,
        'from' => User::class,
        'invoice_payload' => true,
        'shipping_address' => ShippingAddress::class
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
     * Bot specified invoice payload
     *
     * @var string
     */
    protected $invoicePayload;

    /**
     * User specified shipping address
     *
     * @var ShippingAddress
     */
    protected $shippingAddress;

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
    public function getInvoicePayload()
    {
        return $this->invoicePayload;
    }

    /**
     * @author MY
     * @param string $invoicePayload
     */
    public function setInvoicePayload($invoicePayload)
    {
        $this->invoicePayload = $invoicePayload;
    }

    /**
     * @author MY
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @author MY
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
}
