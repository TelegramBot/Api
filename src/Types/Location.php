<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Location
 * This object represents a point on the map.
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
        'longitude' => true,
        'horizontal_accuracy' => true,
        'live_period' => true,
        'heading' => true,
        'proximity_alert_radius' => true,
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
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     *
     * @var float
     */
    protected $horizontalAccuracy;

    /**
     * Optional. Time relative to the message sending date, during which the location can be updated, in seconds. For
     * active live locations only.
     *
     * @var int
     */
    protected $livePeriod;

    /**
     * Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     *
     * @var int
     */
    protected $heading;

    /**
     * Optional. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live
     * locations only.
     *
     * @var int
     */
    protected $proximityAlertRadius;

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     *
     * @throws InvalidArgumentException
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
     *
     * @throws InvalidArgumentException
     */
    public function setLongitude($longitude)
    {
        if (is_float($longitude)) {
            $this->longitude = $longitude;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return float
     */
    public function getHorizontalAccuracy()
    {
        return $this->horizontalAccuracy;
    }

    /**
     * @param float $horizontalAccuracy
     *
     * @throws InvalidArgumentException
     */
    public function setHorizontalAccuracy($horizontalAccuracy)
    {
        if (is_float($horizontalAccuracy)) {
            $this->horizontalAccuracy = $horizontalAccuracy;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return int
     */
    public function getLivePeriod()
    {
        return $this->livePeriod;
    }

    /**
     * @param int $livePeriod
     */
    public function setLivePeriod($livePeriod)
    {
        $this->livePeriod = $livePeriod;
    }

    /**
     * @return int
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param int $heading
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }

    /**
     * @return int
     */
    public function getProximityAlertRadius()
    {
        return $this->proximityAlertRadius;
    }

    /**
     * @param int $proximityAlertRadius
     */
    public function setProximityAlertRadius($proximityAlertRadius)
    {
        $this->proximityAlertRadius = $proximityAlertRadius;
    }
}
