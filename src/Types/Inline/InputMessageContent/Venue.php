<?php

namespace TelegramBot\Api\Types\Inline\InputMessageContent;

use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Inline\InputMessageContent;

class Venue extends InputMessageContent implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['latitude', 'longitude', 'title', 'address'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'latitude' => true,
        'longitude' => true,
        'title' => true,
        'address' => true,
        'foursquare_id' => true,
        'foursquare_type' => true,
        'google_place_id' => true,
        'google_place_type' => true,
    ];

    /**
     * Latitude of the venue in degrees
     *
     * @var float
     */
    protected float $latitude;

    /**
     * Longitude of the venue in degrees
     *
     * @var float
     */
    protected float $longitude;

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
     * @var string|null
     */
    protected ?string $foursquareId;

    /**
     * Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”,
     * “arts_entertainment/aquarium” or “food/icecream”.)
     *
     * @var string|null
     */
    protected ?string $foursquareType;

    /**
     * Optional. Google Places identifier of the venue
     *
     * @var string|null
     */
    protected ?string $googlePlaceId;

    /**
     * Optional. Google Places type of the venue. (See supported types:
     * https://developers.google.com/places/web-service/supported_types)
     *
     * @var string|null
     */
    protected ?string $googlePlaceType;

    /**
     * Venue constructor.
     *
     * @param float       $latitude
     * @param float       $longitude
     * @param string      $title
     * @param string      $address
     * @param string|null $foursquareId
     * @param string|null $foursquareType
     * @param string|null $googlePlaceId
     * @param string|null $googlePlaceType
     */
    public function __construct(
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        ?string $foursquareId = null,
        ?string $foursquareType = null,
        ?string $googlePlaceId = null,
        ?string $googlePlaceType = null
    ) {
        $this->latitude        = $latitude;
        $this->longitude       = $longitude;
        $this->title           = $title;
        $this->address         = $address;
        $this->foursquareId    = $foursquareId;
        $this->foursquareType  = $foursquareType;
        $this->googlePlaceId   = $googlePlaceId;
        $this->googlePlaceType = $googlePlaceType;
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
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquareId;
    }

    /**
     * @param string|null $foursquareId
     */
    public function setFoursquareId(?string $foursquareId): void
    {
        $this->foursquareId = $foursquareId;
    }

    /**
     * @return string|null
     */
    public function getFoursquareType(): ?string
    {
        return $this->foursquareType;
    }

    /**
     * @param string|null $foursquareType
     */
    public function setFoursquareType(?string $foursquareType): void
    {
        $this->foursquareType = $foursquareType;
    }

    /**
     * @return string|null
     */
    public function getGooglePlaceId(): ?string
    {
        return $this->googlePlaceId;
    }

    /**
     * @param string|null $googlePlaceId
     */
    public function setGooglePlaceId(?string $googlePlaceId): void
    {
        $this->googlePlaceId = $googlePlaceId;
    }

    /**
     * @return string|null
     */
    public function getGooglePlaceType(): ?string
    {
        return $this->googlePlaceType;
    }

    /**
     * @param string|null $googlePlaceType
     */
    public function setGooglePlaceType(?string $googlePlaceType): void
    {
        $this->googlePlaceType = $googlePlaceType;
    }
}
