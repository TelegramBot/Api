<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Collection\CollectionItemInterface;
use TelegramBot\Api\TypeInterface;

class BotCommand extends BaseType implements TypeInterface, CollectionItemInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['command', 'description'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'command' => true,
        'description' => true,
    ];

    /**
     * Text of the command, 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     *
     * @var string
     */
    protected $command;

    /**
     * Description of the command, 3-256 characters.
     *
     * @var string
     */
    protected $description;

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param string $command
     * @return void
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
