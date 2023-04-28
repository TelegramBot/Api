<?php
/**
 * Created by PhpStorm.
 * User: iGusev
 * Date: 18/04/16
 * Time: 04:19
 */

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class Venue
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvenue
 * Represents a venue. By default, the venue will be sent by the user.
 * Alternatively, you can use InputMessageContent to send a message with the specified content instead of the venue.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @package TelegramBot\Api\Types\Inline\QueryResult
 */
class Venue extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'id', 'latitude', 'longitude', 'title', 'address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'id' => true,
        'latitude' => true,
        'longitude' => true,
        'title' => true,
        'address' => true,
        'foursquare_id' => true,
        'thumb_url' => true,
        'thumb_width' => true,
        'thumb_height' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $type = 'venue';

    /**
     * Latitude of the venue location in degrees
     *
     * @var float
     */
    protected $latitude;

    /**
     * Longitude of the venue location in degrees
     *
     * @var float
     */
    protected $longitude;

    /**
     * Optional. Thumbnail width
     *
     * @var string|null
     */
    protected $address;

    /**
     * Optional. Url of the thumbnail for the result
     *
     * @var string|null
     */
    protected $thumbUrl;

    /**
     * Optional. Thumbnail width
     *
     * @var int|null
     */
    protected $thumbWidth;

    /**
     * Optional. Thumbnail height
     *
     * @var int|null
     */
    protected $thumbHeight;

    /**
     * Optional. Foursquare identifier of the venue if known
     *
     * @var string|null
     */
    protected $foursquareId;

    /**
     * Voice constructor
     *
     * @param string $id
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $thumbUrl
     * @param int|null $thumbWidth
     * @param int|null $thumbHeight
     * @param string|null $foursquareId
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     * @param InputMessageContent|null $inputMessageContent
     */
    public function __construct(
        $id,
        $latitude,
        $longitude,
        $title,
        $address,
        $thumbUrl = null,
        $thumbWidth = null,
        $thumbHeight = null,
        $foursquareId = null,
        $inputMessageContent = null,
        $inlineKeyboardMarkup = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->address = $address;
        $this->thumbUrl = $thumbUrl;
        $this->thumbWidth = $thumbWidth;
        $this->thumbHeight = $thumbHeight;
        $this->foursquareId = $foursquareId;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     *
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     *
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     *
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getFoursquareId()
    {
        return $this->foursquareId;
    }

    /**
     * @param string|null $foursquareId
     *
     * @return void
     */
    public function setFoursquareId($foursquareId)
    {
        $this->foursquareId = $foursquareId;
    }

    /**
     * @return string|null
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * @param string|null $thumbUrl
     *
     * @return void
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * @return int|null
     */
    public function getThumbWidth()
    {
        return $this->thumbWidth;
    }

    /**
     * @param int|null $thumbWidth
     *
     * @return void
     */
    public function setThumbWidth($thumbWidth)
    {
        $this->thumbWidth = $thumbWidth;
    }

    /**
     * @return int|null
     */
    public function getThumbHeight()
    {
        return $this->thumbHeight;
    }

    /**
     * @param int|null $thumbHeight
     *
     * @return void
     */
    public function setThumbHeight($thumbHeight)
    {
        $this->thumbHeight = $thumbHeight;
    }
}
