<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ForceReply;

class ForceReplyTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ForceReply::class;
    }

    public static function getMinResponse()
    {
        return [
            'force_reply' => true,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'force_reply' => true,
            'selective' => true
        ];
    }

    /**
     * @param ForceReply $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(true, $item->isForceReply());
        $this->assertEquals(null, $item->isSelective());
    }

    /**
     * @param ForceReply $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(true, $item->isForceReply());
        $this->assertEquals(true, $item->isSelective());
    }

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

        $item->setForceReply(false);

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
