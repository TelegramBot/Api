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
    protected static $requiredParams = ['latitude', 'longitude'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
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
     * @var float|null
     */
    protected $horizontalAccuracy;

    /**
     * Optional. Time relative to the message sending date, during which the location can be updated, in seconds. For
     * active live locations only.
     *
     * @var int|null
     */
    protected $livePeriod;

    /**
     * Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     *
     * @var int|null
     */
    protected $heading;

    /**
     * Optional. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live
     * locations only.
     *
     * @var int|null
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
     * @param mixed $latitude
     * @return void
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
     * @param mixed $longitude
     * @return void
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
     * @return float|null
     */
    public function getHorizontalAccuracy()
    {
        return $this->horizontalAccuracy;
    }

    /**
     * @param mixed $horizontalAccuracy
     * @return void
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
     * @return int|null
     */
    public function getLivePeriod()
    {
        return $this->livePeriod;
    }

    /**
     * @param int $livePeriod
     * @return void
     */
    public function setLivePeriod($livePeriod)
    {
        $this->livePeriod = $livePeriod;
    }

    /**
     * @return int|null
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param int $heading
     * @return void
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }

    /**
     * @return int|null
     */
    public function getProximityAlertRadius()
    {
        return $this->proximityAlertRadius;
    }

    /**
     * @param int $proximityAlertRadius
     * @return void
     */
    public function setProximityAlertRadius($proximityAlertRadius)
    {
        $this->proximityAlertRadius = $proximityAlertRadius;
    }
}
