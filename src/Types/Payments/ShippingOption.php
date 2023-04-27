<?php

namespace TelegramBot\Api\Types\Payments;

use TelegramBot\Api\BaseType;

/**
 * Class ShippingOption
 * This object represents one shipping option.
 *
 * @package TelegramBot\Api\Types\Payments
 */
class ShippingOption extends BaseType
{
    /**
     * @var array
     */
    protected static $requiredParams = ['id', 'title', 'prices'];

    /**
     * @var array
     */
    protected static $map = [
        'id' => true,
        'title' => true,
        'prices' => ArrayOfLabeledPrice::class
    ];

    /**
     * Shipping option identifier
     *
     * @var string
     */
    protected $id;

    /**
     * Option title
     *
     * @var string
     */
    protected $title;

    /**
     * List of price portions
     *
     * @var array
     */
    protected $prices;

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
     *
     * @param string $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @author MY
     * @return array
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @author MY
     *
     * @param array $prices
     *
     * @return void
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
    }
}
