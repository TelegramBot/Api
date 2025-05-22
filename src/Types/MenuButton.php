<?php

namespace TelegramBot\\Api\\Types;

use TelegramBot\\Api\\BaseType;
use TelegramBot\\Api\\InvalidArgumentException;
use TelegramBot\\Api\\TypeInterface;

abstract class MenuButton extends BaseType implements TypeInterface
{
    protected static $requiredParams = ['type'];

    protected static $map = [
        'type' => true
    ];

    /**
     * @psalm-suppress LessSpecificReturnType,MoreSpecificReturnType
     */
    public static function fromResponse($data)
    {
        self::validate($data);
        switch ($data['type']) {
            case 'commands':
                return MenuButtonCommands::fromResponse($data);
            case 'web_app':
                return MenuButtonWebApp::fromResponse($data);
            case 'default':
                return MenuButtonDefault::fromResponse($data);
            default:
                throw new InvalidArgumentException('Unknown menu button type: ' . $data['type']);
        }
    }

    protected $type;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
