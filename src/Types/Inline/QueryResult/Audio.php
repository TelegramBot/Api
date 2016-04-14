<?php
/**
 * Created by PhpStorm.
 * User: iGusev
 * Date: 14/04/16
 * Time: 16:53
 */

namespace TelegramBot\Api\Types\Inline\QueryResult;

/**
 * Class Audio
 * @see https://core.telegram.org/bots/api#inlinequeryresultaudio
 * Represents a link to an mp3 audio file. By default, this audio file will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @package TelegramBot\Api\Types\Inline\QueryResult
 */
class Audio extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['type', 'id', 'audio_url', 'title'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'type' => true,
        'id' => true,
        'audio_url' => true,
        'title' => true,
        'performer' => true,
        'audio_duration' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $type = 'audio';

    /**
     * A valid URL for the audio file
     *
     * @var string
     */
    protected $audioUrl;

    /**
     * Optional. Performer
     *
     * @var string
     */
    protected $performer;

    /**
     * Optional. Audio duration in seconds
     *
     * @var int
     */
    protected $audioDuration;

    /**
     * Optional. Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup
     */
    protected $replyMarkup;

    /**
     * Optional. Content of the message to be sent instead of the audio
     *
     * @var InputMessageContent
     */
    protected $inputMessageContent;

    /**
     * Audio constructor.
     *
     * @param string $id
     * @param string $audioUrl
     * @param string $title
     * @param string $performer
     * @param int $audioDuration
     * @param InlineKeyboardMarkup $replyMarkup
     * @param InputMessageContent $inputMessageContent
     */
    public function __construct(
        $id,
        $audioUrl,
        $title,
        $performer = null,
        $audioDuration = null,
        InlineKeyboardMarkup $replyMarkup = null,
        InputMessageContent $inputMessageContent = null
    ) {
        $this->id = $id;
        $this->audioUrl = $audioUrl;
        $this->title = $title;
        $this->performer = $performer;
        $this->audioDuration = $audioDuration;
        $this->replyMarkup = $replyMarkup;
        $this->inputMessageContent = $inputMessageContent;
    }


}
