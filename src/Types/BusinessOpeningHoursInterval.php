<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class BusinessOpeningHoursInterval extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['opening_minute', 'closing_minute'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'opening_minute' => true,
        'closing_minute' => true,
    ];

    /**
     * The minute's sequence number in a week, starting on Monday, marking the start of the time interval during which the business is open; 0 - 7 * 24 * 60
     *
     * @var int
     */
    protected $openingMinute;

    /**
     * The minute's sequence number in a week, starting on Monday, marking the end of the time interval during which the business is open; 0 - 8 * 24 * 60
     *
     * @var int
     */
    protected $closingMinute;

    /**
     * @return int
     */
    public function getOpeningMinute()
    {
        return $this->openingMinute;
    }

    /**
     * @param int $openingMinute
     * @return void
     */
    public function setOpeningMinute($openingMinute)
    {
        $this->openingMinute = $openingMinute;
    }

    /**
     * @return int
     */
    public function getClosingMinute()
    {
        return $this->closingMinute;
    }

    /**
     * @param int $closingMinute
     * @return void
     */
    public function setClosingMinute($closingMinute)
    {
        $this->closingMinute = $closingMinute;
    }
}
