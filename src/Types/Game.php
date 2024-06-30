<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Game
 * This object represents a game.
 *
 * @package TelegramBot\Api\Types
 */
class Game extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['title', 'description', 'photo'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'title' => true,
        'description' => true,
        'photo' => ArrayOfPhotoSize::class,
        'text' => true,
        'text_entities' => ArrayOfMessageEntity::class,
        'animation' => Animation::class
    ];

    /**
     * Title of the game
     *
     * @var string
     */
    protected $title;

    /**
     * Description of the game
     *
     * @var string
     */
    protected $description;

    /**
     * Photo that will be displayed in the game message in chats
     *
     * @var PhotoSize[]
     */
    protected $photo;

    /**
     * Optional. Brief description of the game or high scores included in the game message
     *
     * @var string|null
     */
    protected $text;

    /**
     * Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     *
     * @var MessageEntity[]|null
     */
    protected $textEntities;

    /**
     * Optional. Animation that will be displayed in the game message in chats
     *
     * @var Animation|null
     */
    protected $animation;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return PhotoSize[]
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[] $photo
     */
    public function setPhoto(array $photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return string|null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities()
    {
        return $this->textEntities;
    }

    /**
     * @param MessageEntity[]|null $textEntities
     */
    public function setTextEntities($textEntities)
    {
        $this->textEntities = $textEntities;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     */
    public function setAnimation($animation)
    {
        $this->animation = $animation;
    }
}
