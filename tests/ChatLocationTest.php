<?php

namespace TelegramBot\Api\Test;

use TelegramBot\Api\Types\ChatLocation;
use TelegramBot\Api\Types\Location;

class ChatLocationTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLocation()
    {
        $chatLocation = new ChatLocation();

        $location = new Location();
        $location->setLatitude(55.585827);
        $location->setLongitude(37.675309);

        $chatLocation->setLocation($location);

        $this->assertEquals($location, $chatLocation->getLocation());
    }

    public function testGetAddress()
    {
        $chatLocation = new ChatLocation();
        $chatLocation->setAddress('Wall St. 123');

        $this->assertEquals('Wall St. 123', $chatLocation->getAddress());
    }

    public function testFromResponse()
    {
        $chatLocation = ChatLocation::fromResponse(
            [
                'location' => [
                    'latitude' => 55.585827,
                    'longitude' => 37.675309,
                ],
                'address' => 'Wall St. 123'
            ]
        );
        $this->assertInstanceOf('\TelegramBot\Api\Types\ChatLocation', $chatLocation);
        $this->assertAttributeEquals('Wall St. 123', 'address', $chatLocation);
    }
}
