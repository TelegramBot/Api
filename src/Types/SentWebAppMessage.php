<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class SentWebAppMessage extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = [];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'inline_message_id' => true,
    ];

    /**
     * Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
     *
     * @var string|null
     */
    protected $inlineMessageId;

    /**
     * @return string|null
     */
    public function getInlineMessageId()
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string|null $inlineMessageId
     * @return void
     */
    public function setInlineMessageId($inlineMessageId)
    {
        $this->inlineMessageId = $inlineMessageId;
    }
}
