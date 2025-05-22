<?php

namespace TelegramBot\\Api\\Types;

/**
 * Class StoryAreaTypeSuggestedReaction
 * Describes a story area pointing to a suggested reaction.
 */
class StoryAreaTypeSuggestedReaction extends StoryAreaType
{
    protected static $requiredParams = ['type', 'reaction_type'];

    protected static $map = [
        'type' => true,
        'reaction_type' => ReactionType::class,
        'is_dark' => true,
        'is_flipped' => true
    ];

    protected $type = 'suggested_reaction';
    protected $reactionType;
    protected $isDark;
    protected $isFlipped;

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new static();
        $instance->map($data);
        return $instance;
    }

    public function getReactionType()
    {
        return $this->reactionType;
    }

    public function setReactionType($reactionType)
    {
        $this->reactionType = $reactionType;
    }

    public function getIsDark()
    {
        return $this->isDark;
    }

    public function setIsDark($isDark)
    {
        $this->isDark = $isDark;
    }

    public function getIsFlipped()
    {
        return $this->isFlipped;
    }

    public function setIsFlipped($isFlipped)
    {
        $this->isFlipped = $isFlipped;
    }
}
