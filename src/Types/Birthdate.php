<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Birthdate extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['day', 'month'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'day' => true,
        'month' => true,
        'year' => true,
    ];

    /**
     * Day of the user's birth; 1-31
     *
     * @var int
     */
    protected $day;

    /**
     * Month of the user's birth; 1-12
     *
     * @var int
     */
    protected $month;

    /**
     * Optional. Year of the user's birth
     *
     * @var int|null
     */
    protected $year;

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param int $day
     * @return void
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param int $month
     * @return void
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return int|null
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int|null $year
     * @return void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
}
