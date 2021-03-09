<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

class Contact extends AbstractInlineQueryResult
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['type', 'id', 'phone_number', 'first_name'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'phone_number' => true,
        'first_name' => true,
        'last_name' => true,
        'vcard' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
        'thumb_url' => true,
        'thumb_width' => true,
        'thumb_height' => true,
    ];

    /**
     * Type of the result, must be contact
     *
     * @var string
     */
    protected string $type = 'contact';

    /**
     * Contact's phone number
     *
     * @var string
     */
    protected string $phoneNumber;

    /**
     * Contact's first name
     *
     * @var string
     */
    protected string $firstName;

    /**
     * Optional. Contact's last name
     *
     * @var string|null
     */
    protected ?string $lastName;

    /**
     * Optional. Additional data about the contact in the form of a vCard, 0-2048 byte
     *
     * @var string|null
     */
    protected ?string $vCard;

    /**
     * Optional. Url of the thumbnail for the result
     *
     * @var string|null
     */
    protected ?string $thumbUrl;

    /**
     * Optional. Thumbnail width
     *
     * @var int|null
     */
    protected ?int $thumbWidth;

    /**
     * Optional. Thumbnail height
     *
     * @var int|null
     */
    protected ?int $thumbHeight;

    /**
     * @param                           $id
     * @param string                    $phoneNumber
     * @param string                    $firstName
     * @param string|null               $lastName
     * @param string|null               $vCard
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null  $inputMessageContent
     * @param string|null               $thumbUrl
     * @param int|null                  $thumbWidth
     * @param int|null                  $thumbHeight
     */
    public function __construct(
        $id,
        string $phoneNumber,
        string $firstName,
        ?string $lastName = null,
        ?string $vCard = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null,
        ?string $thumbUrl = null,
        ?int $thumbWidth = null,
        ?int $thumbHeight = null
    ) {
        parent::__construct($id, null, $inputMessageContent, $replyMarkup);

        $this->phoneNumber = $phoneNumber;
        $this->firstName   = $firstName;
        $this->lastName    = $lastName;
        $this->vCard       = $vCard;
        $this->thumbUrl    = $thumbUrl;
        $this->thumbWidth  = $thumbWidth;
        $this->thumbHeight = $thumbHeight;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getVCard(): ?string
    {
        return $this->vCard;
    }

    /**
     * @param string|null $vCard
     */
    public function setVCard(?string $vCard): void
    {
        $this->vCard = $vCard;
    }

    /**
     * @return string|null
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * @param string|null $thumbUrl
     */
    public function setThumbUrl(?string $thumbUrl): void
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * @return int|null
     */
    public function getThumbWidth(): ?int
    {
        return $this->thumbWidth;
    }

    /**
     * @param int|null $thumbWidth
     */
    public function setThumbWidth(?int $thumbWidth): void
    {
        $this->thumbWidth = $thumbWidth;
    }

    /**
     * @return int|null
     */
    public function getThumbHeight(): ?int
    {
        return $this->thumbHeight;
    }

    /**
     * @param int|null $thumbHeight
     */
    public function setThumbHeight(?int $thumbHeight): void
    {
        $this->thumbHeight = $thumbHeight;
    }
}
