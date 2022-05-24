<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 */
class Game extends BaseType implements TypeInterface
{
    /**
     * @var array
     */
    static protected $requiredParams = ['title', 'description', 'photo'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'title' => true,
        'description' => true,
        'photo' => ArrayOfPhotoSize::class,
        'text' => true,
        'text_entities' => MessageEntity::class,
        'animation' => Animation::class,
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
     * Photo that will be displayed in the game message in chats.
     *
     * @var ArrayOfPhotoSize
     */
    protected $photo;

    /**
     * Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include
     * current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     *
     * @var MessageEntity[]
     */
    protected $textEntities;

    /**
     * Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
     *
     * @var Animation
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
     * @return ArrayOfPhotoSize
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param ArrayOfPhotoSize $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]
     */
    public function getTextEntities()
    {
        return $this->textEntities;
    }

    /**
     * @param MessageEntity[] $textEntities
     */
    public function setTextEntities($textEntities)
    {
        $this->textEntities = $textEntities;
    }

    /**
     * @return Animation
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * @param Animation $animation
     */
    public function setAnimation($animation)
    {
        $this->animation = $animation;
    }

}
