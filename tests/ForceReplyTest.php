<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\ForceReply;

class ForceReplyTest extends TestCase
{
    public function testConstructor()
    {
        $item = new ForceReply();

        $this->assertEquals(true, $item->isForceReply());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor2()
    {
        $item = new ForceReply(true, true);

        $this->assertEquals(true, $item->isForceReply());
        $this->assertEquals(true, $item->isSelective());
    }

    public function testConstructor3()
    {
        $item = new ForceReply(false, true);

        $this->assertEquals(false, $item->isForceReply());
        $this->assertEquals(true, $item->isSelective());
    }

    public function testConstructor4()
    {
        $item = new ForceReply(true);

        $this->assertEquals(true, $item->isForceReply());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testSetforceReply()
    {
        $item = new ForceReply(true);

        $item->setforceReply(false);

        $this->assertEquals(false, $item->isforceReply());
    }

    public function testSetSelective()
    {
        $item = new ForceReply();

        $item->setSelective(true);

        $this->assertEquals(true, $item->isSelective());
    }

    public function testToJson()
    {
        $item = new ForceReply();

        $this->assertEquals(json_encode(['force_reply' => true]), $item->toJson());
    }

    public function testToJson2()
    {
        $item = new ForceReply();

        $this->assertEquals(['force_reply' => true], $item->toJson(true));
    }

    public function testToJson3()
    {
        $item = new ForceReply(true, true);

        $this->assertEquals(json_encode(['force_reply' => true, 'selective' => true]), $item->toJson());
    }

    public function testToJson4()
    {
        $item = new ForceReply(true, true);

        $this->assertEquals(['force_reply' => true, 'selective' => true], $item->toJson(true));
    }
}
