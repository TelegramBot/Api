<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Location;

class LocationTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Location::class;
    }

    public static function getMinResponse()
    {
        return [
            'latitude' => 55.585827,
            'longitude' => 37.675309,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'latitude' => 55.585827,
            'longitude' => 37.675309,
            'horizontal_accuracy' => 20.5,
            'live_period' => 300,
            'heading' => 100,
            'proximity_alert_radius' => 15
        ];
    }

    /**
     * @param Location $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(55.585827, $item->getLatitude());
        $this->assertEquals(37.675309, $item->getLongitude());
        $this->assertNull($item->getHorizontalAccuracy());
        $this->assertNull($item->getLivePeriod());
        $this->assertNull($item->getHeading());
        $this->assertNull($item->getProximityAlertRadius());
    }

    /**
     * @param Location $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(55.585827, $item->getLatitude());
        $this->assertEquals(37.675309, $item->getLongitude());
        $this->assertEquals(20.5, $item->getHorizontalAccuracy());
        $this->assertEquals(300, $item->getLivePeriod());
        $this->assertEquals(100, $item->getHeading());
        $this->assertEquals(15, $item->getProximityAlertRadius());
    }

    public function testSetHorizontalAccuracyException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Location();
        $item->setHorizontalAccuracy('s');
    }

    public function testSetLatitudeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Location();
        $item->setLatitude('s');
    }

    public function testSetLongitudeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Location();
        $item->setLongitude('s');
    }

}
