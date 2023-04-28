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
 * class MessageEntity.
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
    const TYPE_UNDERLINE = 'underline';
    const TYPE_STRIKETHROUGH = 'strikethrough';
    const TYPE_CODE = 'code';
    const TYPE_PRE = 'pre';
    const TYPE_TEXT_LINK = 'text_link';
    const TYPE_TEXT_MENTION = 'text_mention';
    const TYPE_CUSTOM_EMOJI = 'custom_emoji';

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['type', 'offset', 'length'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'type' => true,
        'offset' => true,
        'length' => true,
        'url' => true,
        'user' => User::class,
        'language' => true,
        'custom_emoji_id' => true,
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
     * Optional. For “pre” only, the programming language of the entity text
     *
     * @var string|null
     */
    protected $language;

    /**
     * Optional. For “custom_emoji” only, unique identifier of the custom emoji.
     * Use getCustomEmojiStickers to get full information about the sticker
     *
     * @var string|null
     */
    protected $customEmojiId;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return void
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return void
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return null|string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return null|string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return void
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return null|string
     */
    public function getCustomEmojiId()
    {
        return $this->customEmojiId;
    }

    /**
     * @param string $customEmojiId
     * @return void
     */
    public function setCustomEmojiId($customEmojiId)
    {
        $this->customEmojiId = $customEmojiId;
    }
}
