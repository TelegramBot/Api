<?php

namespace TelegramBot\Api\Test;


use TelegramBot\Api\Types\Location;

class LocationTest extends \PHPUnit_Framework_TestCase
{
    public function testSetLatitude()
    {
        $location = new Location();
        $location->setLatitude(55.585827);
        $this->assertAttributeEquals(55.585827, 'latitude', $location);
    }

    public function testGetLatitude()
    {
        $location = new Location();
        $location->setLatitude(55.585827);
        $this->assertEquals(55.585827, $location->getLatitude());
    }

    public function testSetLongtitude()
    {
        $location = new Location();
        $location->setLongitude(37.675309);
        $this->assertAttributeEquals(37.675309, 'longitude', $location);
    }

    public function testGetLongtitude()
    {
        $location = new Location();
        $location->setLongitude(37.675309);
        $this->assertEquals(37.675309, $location->getLongitude());
    }

    public function testFromResponse()
    {
        $location = Location::fromResponse(["latitude" => 55.585827, 'longitude' => 37.675309]);
        $this->assertInstanceOf('\TelegramBot\Api\Types\Location', $location);
        $this->assertAttributeEquals(55.585827, 'latitude', $location);
        $this->assertAttributeEquals(37.675309, 'longitude', $location);
    }

}
