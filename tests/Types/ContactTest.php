<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\Contact;

class ContactTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Contact::class;
    }

    public static function getMinResponse()
    {
        return [
            'first_name' => 'Ilya',
            'phone_number' => '123456',
        ];
    }

    public static function getFullResponse()
    {
        return [
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'phone_number' => '123456',
            'user_id' => 'iGusev',
            'vcard' => 'vcard',
        ];
    }

    /**
     * @param Contact $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('123456', $item->getPhoneNumber());
        $this->assertEquals('Ilya', $item->getFirstName());
        $this->assertNull($item->getLastName());
        $this->assertNull($item->getUserId());
        $this->assertNull($item->getVCard());
    }

    /**
     * @param Contact $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('123456', $item->getPhoneNumber());
        $this->assertEquals('Ilya', $item->getFirstName());
        $this->assertEquals('Gusev', $item->getLastName());
        $this->assertEquals('iGusev', $item->getUserId());
        $this->assertEquals('vcard', $item->getVCard());
    }
}
