<?php
/**
 * Created by PhpStorm.
 * User: iGusev
 * Date: 14/04/16
 * Time: 14:41
 */

namespace TelegramBot\Api\Types\Inline\InputMessageContent;

use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\LinkPreviewOptions;
use TelegramBot\Api\Types\ArrayOfMessageEntity;
use TelegramBot\Api\Types\Inline\InputMessageContent;

/**
 * Class Text
 * @see https://core.telegram.org/bots/api#inputtextmessagecontent
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 * @package TelegramBot\Api\Types\Inline\InputMessageContent
 */
class Text extends InputMessageContent implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['message_text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'message_text' => true,
        'parse_mode' => true,
        'entities' => ArrayOfMessageEntity::class,
        'disable_web_page_preview' => true, // @todo: remove as deprecated with bot api 7.0
        'link_preview_options' => LinkPreviewOptions::class
    ];

    /**
     * Text of the message to be sent, 1-4096 characters
     *
     * @var string
     */
    protected $messageText;

    /**
     * Optional. Send Markdown or HTML,
     * if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     *
     * @var string|null
     */
    protected $parseMode;

    /**
     * @deprecated use $linkPreviewOptions instead
     * Optional. Disables link previews for links in the sent message
     *
     * @var bool|null
     */
    protected $disableWebPagePreview;

    /**
     * Link preview generation options for the message
     *
     * @var LinkPreviewOptions|null
     */
    protected $linkPreviewOptions;

    /**
     * Text constructor.
     *
     * @param string $messageText
     * @param string|null $parseMode
     * @param bool $disableWebPagePreview
     * @param LinkPreviewOptions|null $linkPreviewOptions Link preview generation options for the message.
     */
    public function __construct($messageText, $parseMode = null, $disableWebPagePreview = false, $linkPreviewOptions = null)
    {
        $this->messageText = $messageText;
        $this->parseMode = $parseMode;
        $this->disableWebPagePreview = $disableWebPagePreview;

        if (null === $linkPreviewOptions && false !== $disableWebPagePreview) {
            @trigger_error('setting $disableWebPagePreview is now deprecated use $linkPreviewOptions instead', E_USER_DEPRECATED);

            $this->linkPreviewOptions = new LinkPreviewOptions();
            $this->linkPreviewOptions->map([
                'is_disabled' => $disableWebPagePreview
            ]);
        }
    }

    /**
     * @return string
     */
    public function getMessageText()
    {
        return $this->messageText;
    }

    /**
     * @param string $messageText
     *
     * @return void
     */
    public function setMessageText($messageText)
    {
        $this->messageText = $messageText;
    }

    /**
     * @return string|null
     */
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     *
     * @return void
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return bool|null
     */
    public function isDisableWebPagePreview()
    {
        return $this->disableWebPagePreview;
    }

    /**
     * @param bool|null $disableWebPagePreview
     *
     * @return void
     */
    public function setDisableWebPagePreview($disableWebPagePreview)
    {
        $this->disableWebPagePreview = $disableWebPagePreview;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions()
    {
        return $this->linkPreviewOptions;
    }

    /**
     * @param LinkPreviewOptions|null $linkPreviewOptions
     * @return void
     */
    public function setLinkPreviewOptions($linkPreviewOptions)
    {
        $this->linkPreviewOptions = $linkPreviewOptions;
    }
}
