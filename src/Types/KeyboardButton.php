<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class KeyboardButton extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['text'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'text' => true,
        'request_contact' => true,
        'request_location' => true,
        'request_poll' => KeyboardButtonPollType::class
    ];

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is
     * pressed
     *
     * @var string
     */
    protected string $text;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in
     * private chats only
     *
     * @var bool
     */
    protected bool $requestContact;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed. Available in private
     * chats only
     *
     * @var bool
     */
    protected bool $requestLocation;

    /**
     * Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is
     * pressed. Available in private chats only
     *
     * @var bool
     */
    protected bool $requestPoll;

    /**
     * @param string $text
     * @param bool   $requestContact
     * @param bool   $requestLocation
     * @param bool   $requestPoll
     */
    public function __construct(
        string $text,
        bool $requestContact = false,
        bool $requestLocation = false,
        bool $requestPoll = false
    ) {
        $this->text            = $text;
        $this->requestContact  = $requestContact;
        $this->requestLocation = $requestLocation;
        $this->requestPoll     = $requestPoll;
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
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return bool
     */
    public function isRequestContact(): bool
    {
        return $this->requestContact;
    }

    /**
     * @param bool $requestContact
     */
    public function setRequestContact(bool $requestContact): void
    {
        $this->requestContact = $requestContact;
    }

    /**
     * @return bool
     */
    public function isRequestLocation(): bool
    {
        return $this->requestLocation;
    }

    /**
     * @param bool $requestLocation
     */
    public function setRequestLocation(bool $requestLocation): void
    {
        $this->requestLocation = $requestLocation;
    }

    /**
     * @return bool
     */
    public function isRequestPoll(): bool
    {
        return $this->requestPoll;
    }

    /**
     * @param bool $requestPoll
     */
    public function setRequestPoll(bool $requestPoll): void
    {
        $this->requestPoll = $requestPoll;
    }
}
