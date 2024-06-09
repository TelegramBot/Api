<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatBoost
 * This object contains information about a chat boost.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoost extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['boost_id', 'add_date', 'expiration_date', 'source'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'boost_id' => true,
        'add_date' => true,
        'expiration_date' => true,
        'source' => ChatBoostSource::class
    ];

    /**
     * Unique identifier of the boost
     *
     * @var string
     */
    protected $boostId;

    /**
     * Point in time (Unix timestamp) when the chat was boosted
     *
     * @var int
     */
    protected $addDate;

    /**
     * Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium subscription is prolonged
     *
     * @var int
     */
    protected $expirationDate;

    /**
     * Source of the added boost
     *
     * @var ChatBoostSource
     */
    protected $source;

    /**
     * @return string
     */
    public function getBoostId()
    {
        return $this->boostId;
    }

    /**
     * @param string $boostId
     */
    public function setBoostId($boostId)
    {
        $this->boostId = $boostId;
    }

    /**
     * @return int
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * @param int $addDate
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
    }

    /**
     * @return int
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param int $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return ChatBoostSource
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param ChatBoostSource $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }
}
