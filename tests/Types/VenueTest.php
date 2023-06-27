<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Venue;

class VenueTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Venue::class;
    }

    public static function getMinResponse()
    {
        return [
            'location' => LocationTest::getMinResponse(),
            'title' => 'title',
            'address' => 'address',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'location' => LocationTest::getMinResponse(),
            'title' => 'title',
            'address' => 'address',
            'foursquare_id' => 'foursquare_id',
            'foursquare_type' => 'foursquare_type',
            'google_place_id' => 'google_place_id',
            'google_place_type' => 'google_place_type',
        ];
    }

    /**
     * @param Venue $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('address', $item->getAddress());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertNull($item->getFoursquareId());
        $this->assertNull($item->getFoursquareType());
        $this->assertNull($item->getGooglePlaceId());
        $this->assertNull($item->getGooglePlaceType());
    }

    /**
     * @param Venue $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('address', $item->getAddress());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertEquals('foursquare_id', $item->getFoursquareId());
        $this->assertEquals('foursquare_type', $item->getFoursquareType());
        $this->assertEquals('google_place_id', $item->getGooglePlaceId());
        $this->assertEquals('google_place_type', $item->getGooglePlaceType());
    }
}
