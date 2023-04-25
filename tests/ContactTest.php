<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\Contact;

class ContactTest extends TestCase
{
    public function testSetPhoneNumber()
    {
        $contact = new Contact();
        $contact->setPhoneNumber('123456');
        $this->assertEquals('123456', $contact->getPhoneNumber());
    }

    public function testSetFirstName()
    {
        $contact = new Contact();
        $contact->setFirstName('Ilya');
        $this->assertEquals('Ilya', $contact->getFirstName());
    }

    public function testSetLastName()
    {
        $contact = new Contact();
        $contact->setLastName('Gusev');
        $this->assertEquals('Gusev', $contact->getLastName());
    }

    public function testSetUserId()
    {
        $contact = new Contact();
        $contact->setUserId('iGusev');
        $this->assertEquals('iGusev', $contact->getUserId());
    }

    public function testSetVcard()
    {
        $contact = new Contact();
        $contact->setVCard('testVCard');
        $this->assertEquals('testVCard', $contact->getVCard());
    }

    public function testFromResponse()
    {
        $contact = Contact::fromResponse([
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'phone_number' => '123456',
            'user_id' => 'iGusev'
        ]);
        $this->assertInstanceOf('\TelegramBot\Api\Types\Contact', $contact);
        $this->assertEquals('123456', $contact->getPhoneNumber());
        $this->assertEquals('Ilya', $contact->getFirstName());
        $this->assertEquals('Gusev', $contact->getLastName());
        $this->assertEquals('iGusev', $contact->getUserId());
    }
}
