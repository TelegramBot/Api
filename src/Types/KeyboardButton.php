<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class KeyboardButton
 * This object represents one button of the reply keyboard.
 * For simple text buttons String can be used instead of this object to specify text of the button.
 * Optional fields are mutually exclusive.
 *
 * @package TelegramBot\Api\Types
 */
class KeyboardButton extends BaseType implements \JsonSerializable
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'text' => true,
        'request_contact' => true,
        'request_location' => true,
    ];

    /**
     * Text of the button. If none of the optional fields are used,
     * it will be sent as a message when the button is pressed
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only
     *
     * @var bool|null
     */
    protected $requestContact;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only
     *
     * @var bool|null
     */
    protected $requestLocation;

    /**
     * KeyboardButton constructor.
     * @param string|null $text
     * @param bool|null $requestContact
     * @param bool|null $requestLocation
     */
    public function __construct(?string $text = null, ?bool $requestContact = null, ?bool $requestLocation = null)
    {
        $this->text = $text;
        $this->requestContact = $requestContact;
        $this->requestLocation = $requestLocation;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return KeyboardButton
     */
    public function setText(string $text): KeyboardButton
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestContact(): ?bool
    {
        return $this->requestContact;
    }

    /**
     * @param bool|null $requestContact
     * @return KeyboardButton
     */
    public function setRequestContact(?bool $requestContact): KeyboardButton
    {
        $this->requestContact = $requestContact;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestLocation(): ?bool
    {
        return $this->requestLocation;
    }

    /**
     * @param bool|null $requestLocation
     * @return KeyboardButton
     */
    public function setRequestLocation(?bool $requestLocation): KeyboardButton
    {
        $this->requestLocation = $requestLocation;

        return $this;
    }
}
