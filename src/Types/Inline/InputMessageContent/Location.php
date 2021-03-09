<?php

namespace TelegramBot\Api\Types\Inline\InputMessageContent;

use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\InputMessageContent;

class Location extends InputMessageContent implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['latitude', 'longitude'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'latitude' => true,
        'longitude' => true
    ];

    /**
     * Latitude of the location in degrees
     *
     * @var float
     */
    protected float $latitude;

    /**
     * Longitude of the location in degrees
     *
     * @var float
     */
    protected float $longitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     *
     * @var float
     */
    protected float $horizontalAccuracy;

    /**
     * Optional. Time relative to the message sending date, during which the location can be updated, in seconds. For
     * active live locations only.
     *
     * @var int
     */
    protected int $livePeriod;

    /**
     * Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     *
     * @var int
     */
    protected int $heading;

    /**
     * Optional. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live
     * locations only.
     *
     * @var int
     */
    protected int $proximityAlertRadius;

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getHorizontalAccuracy(): float
    {
        return $this->horizontalAccuracy;
    }

    /**
     * @param float $horizontalAccuracy
     */
    public function setHorizontalAccuracy(float $horizontalAccuracy): void
    {
        $this->horizontalAccuracy = $horizontalAccuracy;
    }

    /**
     * @return int
     */
    public function getLivePeriod(): int
    {
        return $this->livePeriod;
    }

    /**
     * @param int $livePeriod
     */
    public function setLivePeriod(int $livePeriod): void
    {
        $this->livePeriod = $livePeriod;
    }

    /**
     * @return int
     */
    public function getHeading(): int
    {
        return $this->heading;
    }

    /**
     * @param int $heading
     */
    public function setHeading(int $heading): void
    {
        $this->heading = $heading;
    }

    /**
     * @return int
     */
    public function getProximityAlertRadius(): int
    {
        return $this->proximityAlertRadius;
    }

    /**
     * @param int $proximityAlertRadius
     */
    public function setProximityAlertRadius(int $proximityAlertRadius): void
    {
        $this->proximityAlertRadius = $proximityAlertRadius;
    }
}
