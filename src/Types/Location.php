<?php

namespace tgbot\Api\Types;

/**
 * Class Location
 * This object represents a point on the map.
 *
 * @package tgbot\Api\Types
 */
class Location
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
}