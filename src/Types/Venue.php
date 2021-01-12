<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Venue extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['location', 'title', 'address'];

    /**
     * @var array
     */
    protected static array $map = [
        'location' => Location::class,
        'title' => true,
        'address' => true,
        'foursquare_id' => true,
        'foursquare_type' => true,
        'google_place_id' => true,
        'google_place_type' => true,
    ];

    /**
     * Venue location. Can't be a live location
     *
     * @var Location
     */
    protected Location $location;

    /**
     * Name of the venue
     *
     * @var string
     */
    protected string $title;

    /**
     * Address of the venue
     *
     * @var string
     */
    protected string $address;

    /**
     * Optional. Foursquare identifier of the venue
     *
     * @var string
     */
    protected string $foursquareId;

    /**
     * Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”,
     * “arts_entertainment/aquarium” or “food/icecream”.)
     *
     * @var string
     */
    protected string $foursquareType;

    /**
     * Optional. Google Places identifier of the venue
     *
     * @var string
     */
    protected string $googlePlaceId;

    /**
     * Optional. Google Places type of the venue. (See supported types:
     * https://developers.google.com/places/web-service/supported_types)
     *
     * @var string
     */
    protected string $googlePlaceType;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getFoursquareId(): string
    {
        return $this->foursquareId;
    }

    /**
     * @param string $foursquareId
     */
    public function setFoursquareId(string $foursquareId): void
    {
        $this->foursquareId = $foursquareId;
    }

    /**
     * @return string
     */
    public function getFoursquareType(): string
    {
        return $this->foursquareType;
    }

    /**
     * @param string $foursquareType
     */
    public function setFoursquareType(string $foursquareType): void
    {
        $this->foursquareType = $foursquareType;
    }

    /**
     * @return string
     */
    public function getGooglePlaceId(): string
    {
        return $this->googlePlaceId;
    }

    /**
     * @param string $googlePlaceId
     */
    public function setGooglePlaceId(string $googlePlaceId): void
    {
        $this->googlePlaceId = $googlePlaceId;
    }

    /**
     * @return string
     */
    public function getGooglePlaceType(): string
    {
        return $this->googlePlaceType;
    }

    /**
     * @param string $googlePlaceType
     */
    public function setGooglePlaceType(string $googlePlaceType): void
    {
        $this->googlePlaceType = $googlePlaceType;
    }
}
