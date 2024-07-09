<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class ChatBoostSource
 * This object describes the source of a chat boost.
 *
 * @package TelegramBot\Api\Types
 */
class ChatBoostSource extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['source', 'user'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'source' => true,
        'user' => User::class,
    ];

    /**
     * @psalm-suppress LessSpecificReturnStatement,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        $source = $data['source'];

        switch ($source) {
            case 'premium':
                return ChatBoostSourcePremium::fromResponse($data);
            case 'gift_code':
                return ChatBoostSourceGiftCode::fromResponse($data);
            case 'giveaway':
                return ChatBoostSourceGiveaway::fromResponse($data);
            default:
                throw new InvalidArgumentException("Unknown chat boost source: $source");
        }
    }

    /**
     * Source of the boost, always “premium”, “gift_code”, or “giveaway”
     *
     * @var string
     */
    protected $source;

    /**
     * User that boosted the chat or for which the gift code was created
     *
     * @var User
     */
    protected $user;

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}
