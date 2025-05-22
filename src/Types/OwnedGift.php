<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\TypeInterface;
use TelegramBot\\Api\\InvalidArgumentException;

class OwnedGift extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type', 'gift', 'send_date'];

    protected static $map = [
        'type' => true,
        'gift' => true,
        'owned_gift_id' => true,
        'sender_user' => User::class,
        'send_date' => true,
    ];

    protected $type;
    protected $gift;
    protected $ownedGiftId;
    protected $senderUser;
    protected $sendDate;

    /**
     * @psalm-suppress LessSpecificReturnStatement,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'regular':
                return OwnedGiftRegular::fromResponse($data);
            case 'unique':
                return OwnedGiftUnique::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown owned gift type: ' . $data['type']);
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getGift()
    {
        return $this->gift;
    }

    public function setGift($gift)
    {
        $this->gift = $gift;
    }

    public function getOwnedGiftId()
    {
        return $this->ownedGiftId;
    }

    public function setOwnedGiftId($ownedGiftId)
    {
        $this->ownedGiftId = $ownedGiftId;
    }

    public function getSenderUser()
    {
        return $this->senderUser;
    }

    public function setSenderUser($senderUser)
    {
        $this->senderUser = $senderUser;
    }

    public function getSendDate()
    {
        return $this->sendDate;
    }

    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;
    }
}
