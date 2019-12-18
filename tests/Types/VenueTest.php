<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\Location;
use TelegramBot\Api\Types\Venue;
use PHPUnit\Framework\TestCase;

class VenueTest extends TestCase
{

    public function testSetFoursquareType()
    {
        $item = (new Venue())->setFoursquareType('fid');
        $this->assertEquals('fid', $item->getFoursquareType());
    }

    public function testSetFoursquareId()
    {
        $item = (new Venue())->setFoursquareId('fid2');
        $this->assertEquals('fid2', $item->getFoursquareId());
    }

    public function testSetTitle()
    {
        $item = (new Venue())->setTitle('fid3');
        $this->assertEquals('fid3', $item->getTitle());
    }

    public function testSetLocation()
    {
        $location = (new Location())->setLatitude(55.585827)->setLongitude(37.675309);
        $item = (new Venue())->setLocation($location);
        $this->assertEquals($location, $item->getLocation());
    }

    public function testSetAddress()
    {
        $item = (new Venue())->setAddress('kazan');
        $this->assertEquals('kazan', $item->getAddress());
    }
}
