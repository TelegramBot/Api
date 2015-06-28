<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Location
 * This object represents a point on the map.
 *
 * @package TelegramBot\Api\Types
 */
class Location implements TypeInterface
{
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
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        if (is_float($latitude)) {
            $this->latitude = $latitude;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        if (is_float($longitude)) {
            $this->longitude = $longitude;
        } else {
            throw new InvalidArgumentException();
        }
        }
    }

    public static function fromResponse($data)
    {
        $instance = new self();

        if (!isset($data['latitude'], $data['longitude'])) {
            throw new InvalidArgumentException();
        }
        $instance->setLatitude($data['latitude']);
        $instance->setLongitude($data['longitude']);

        return $instance;
    }
}
