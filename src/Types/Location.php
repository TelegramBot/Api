<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Location
 * This object represents a point on the map
 *
 * @package TelegramBot\Api\Types
 */
class Location extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['latitude', 'longitude'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'latitude' => true,
        'longitude' => true
    ];

    /**
     * Longitude as defined by sender
     *
     * @var float
     */
    protected $longitude;

    /**
     * Latitude as defined by sender
     *
     * @var float
     */
    protected $latitude;

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Location
     */
    public function setLongitude(float $longitude): Location
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Location
     */
    public function setLatitude(float $latitude): Location
    {
        $this->latitude = $latitude;

        return $this;
    }
}
