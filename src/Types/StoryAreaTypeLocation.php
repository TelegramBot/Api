<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class StoryAreaTypeLocation
 * Describes a story area pointing to a location.
 */
class StoryAreaTypeLocation extends StoryAreaType
{
    protected static $requiredParams = ['type', 'latitude', 'longitude'];

    protected static $map = [
        'type' => true,
        'latitude' => true,
        'longitude' => true,
        'address' => LocationAddress::class
    ];

    protected $type = 'location';
    protected $latitude;
    protected $longitude;
    protected $address;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}
