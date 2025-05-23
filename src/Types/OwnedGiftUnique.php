<?php

namespace TelegramBot\\Api\\Types;

class OwnedGiftUnique extends OwnedGift
{
    protected static $requiredParams = ['type', 'gift', 'send_date'];

    protected static $map = [
        'type' => true,
        'gift' => UniqueGift::class,
        'owned_gift_id' => true,
        'sender_user' => User::class,
        'send_date' => true,
        'is_saved' => true,
        'can_be_transferred' => true,
        'transfer_star_count' => true,
    ];

    protected $isSaved;
    protected $canBeTransferred;
    protected $transferStarCount;
    protected $type = 'unique';

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getIsSaved()
    {
        return $this->isSaved;
    }

    public function setIsSaved($isSaved)
    {
        $this->isSaved = $isSaved;
    }

    public function getCanBeTransferred()
    {
        return $this->canBeTransferred;
    }

    public function setCanBeTransferred($canBeTransferred)
    {
        $this->canBeTransferred = $canBeTransferred;
    }

    public function getTransferStarCount()
    {
        return $this->transferStarCount;
    }

    public function setTransferStarCount($transferStarCount)
    {
        $this->transferStarCount = $transferStarCount;
    }
}
