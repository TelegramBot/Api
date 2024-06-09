<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class BusinessOpeningHours extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['time_zone_name', 'opening_hours'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'time_zone_name' => true,
        'opening_hours' => ArrayOfBusinessOpeningHoursInterval::class,
    ];

    /**
     * Unique name of the time zone for which the opening hours are defined
     *
     * @var string
     */
    protected $timeZoneName;

    /**
     * List of time intervals describing business opening hours
     *
     * @var array
     */
    protected $openingHours;

    /**
     * @return string
     */
    public function getTimeZoneName()
    {
        return $this->timeZoneName;
    }

    /**
     * @param string $timeZoneName
     * @return void
     */
    public function setTimeZoneName($timeZoneName)
    {
        $this->timeZoneName = $timeZoneName;
    }

    /**
     * @return array
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    /**
     * @param array $openingHours
     * @return void
     */
    public function setOpeningHours($openingHours)
    {
        $this->openingHours = $openingHours;
    }
}
