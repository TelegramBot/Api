<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\Location;

class LocationTest extends TestCase
{
    public function testSetLatitude()
    {
        $location = new Location();
        $location->setLatitude(55.585827);
        $this->assertEquals(55.585827, $location->getLatitude());
    }

    public function testSetLongtitude()
    {
        $location = new Location();
        $location->setLongitude(37.675309);
        $this->assertEquals(37.675309, $location->getLongitude());
    }

    public function testFromResponse()
    {
        $location = Location::fromResponse(['latitude' => 55.585827, 'longitude' => 37.675309]);
        $this->assertInstanceOf(Location::class, $location);
        $this->assertEquals(55.585827, $location->getLatitude());
        $this->assertEquals(37.675309, $location->getLongitude());
    }

    public function testSetLatitudeException()
    {
        $this->expectException(\TypeError::class);
        $item = new Location();
        $item->setLatitude('s');
    }

    public function testSetLongitudeException()
    {
        $this->expectException(\TypeError::class);
        $item = new Location();
        $item->setLongitude('s');
    }
}
