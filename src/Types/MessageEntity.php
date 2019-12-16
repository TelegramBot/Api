<?php
/**
 * Created by PhpStorm.
 * User: iGusev
 * Date: 13/04/16
 * Time: 04:10
 */

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class MessageEntity
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @package TelegramBot\Api\Types
 */
class MessageEntity extends BaseType implements TypeInterface
{

    const TYPE_MENTION = 'mention';
    const TYPE_HASHTAG = 'hashtag';
    const TYPE_CASHTAG = 'cashtag';
    const TYPE_BOT_COMMAND = 'bot_command';
    const TYPE_URL = 'url';
    const TYPE_EMAIL = 'email';
    const TYPE_PHONE_NUMBER = 'phone_number';
    const TYPE_BOLD = 'bold';
    const TYPE_ITALIC = 'italic';
    const TYPE_CODE = 'code';
    const TYPE_PRE = 'pre';
    const TYPE_TEXT_LINK = 'text_link';
    const TYPE_TEXT_MENTION = 'text_mention';

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['type', 'offset', 'length'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'type' => true,
        'offset' => true,
        'length' => true,
        'url' => true,
        'user' => User::class,
    ];

    /**
     * Type of the entity.
     * Can be mention (@username), hashtag, cashtag, bot_command, url, email, phone_number, bold (bold text),
     * italic (italic text), code (monowidth string), pre (monowidth block), text_link (for clickable text URLs),
     * text_mention (for users without usernames)
     *
     * @var string
     */
    protected $type;

    /**
     * Offset in UTF-16 code units to the start of the entity
     *
     * @var int
     */
    protected $offset;

    /**
     * Length of the entity in UTF-16 code units
     *
     * @var int
     */
    protected $length;

    /**
     * Optional. For “text_link” only, url that will be opened after user taps on the text
     *
     * @var string|null
     */
    protected $url;

    /**
     * Optional. For “text_mention” only, the mentioned user
     *
     * @var User|null
     */
    protected $user;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return MessageEntity
     */
    public function setType(string $type): MessageEntity
    {
        $this->type = $type;
        return $this;
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
     * @return MessageEntity
     */
    public function setOffset(int $offset): MessageEntity
    {
        $this->offset = $offset;

        return $this;
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
     * @return MessageEntity
     */
    public function setLength(int $length): MessageEntity
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return MessageEntity
     */
    public function setUrl(string $url): MessageEntity
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return MessageEntity
     */
    public function setUser(User $user): MessageEntity
    {
        $this->user = $user;

        return $this;
    }
}
