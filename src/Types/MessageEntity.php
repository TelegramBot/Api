<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class MessageEntity extends BaseType implements TypeInterface
{
    protected const TYPE_MENTION = 'mention';
    protected const TYPE_HASHTAG = 'hashtag';
    protected const TYPE_CASHTAG = 'cashtag';
    protected const TYPE_BOT_COMMAND = 'bot_command';
    protected const TYPE_URL = 'url';
    protected const TYPE_EMAIL = 'email';
    protected const TYPE_PHONE_NUMBER = 'phone_number';
    protected const TYPE_BOLD = 'bold';
    protected const TYPE_ITALIC = 'italic';
    protected const TYPE_UNDERLINE = 'underline';
    protected const TYPE_STRIKETHROUGH = 'strikethrough';
    protected const TYPE_CODE = 'code';
    protected const TYPE_PRE = 'pre';
    protected const TYPE_TEXT_LINK = 'text_link';
    protected const TYPE_TEXT_MENTION = 'text_mention';

    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['type', 'offset', 'length'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'offset' => true,
        'length' => true,
        'url' => true,
        'user' => User::class,
        'language' => true,
    ];

    /**
     * Type of the entity.
     * One of mention (@username), hashtag (#hashtag), cashtag ($USD), bot_command, url, email, phone_number,
     * bold (bold text), italic (italic text), underline (underlined text), strikethrough (strikethrough text),
     * code (monowidth string), pre (monowidth block), text_link (for clickable text URLs),
     * text_mention (for users without usernames)
     *
     * @var string
     */
    protected string $type;

    /**
     * Offset in UTF-16 code units to the start of the entity
     *
     * @var int
     */
    protected int $offset;

    /**
     * Length of the entity in UTF-16 code units
     *
     * @var int
     */
    protected int $length;

    /**
     * Optional. For “text_link” only, url that will be opened after user taps on the text
     *
     * @var string
     */
    protected string $url;

    /**
     * Optional. For “text_mention” only, the mentioned user
     *
     * @var User
     */
    protected User $user;

    /**
     * Optional. For “pre” only, the programming language of the entity text
     *
     * @var string
     */
    protected string $language;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }
}
