<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ChatInviteLink;

class ChatInviteLinkTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ChatInviteLink::class;
    }

    public static function getMinResponse()
    {
        return [
            'invite_link' => 'invite_link',
            'creator' => UserTest::getMinResponse(),
            'creates_join_request' => true,
            'is_primary' => true,
            'is_revoked' => true,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'invite_link' => 'invite_link',
            'creator' => UserTest::getMinResponse(),
            'creates_join_request' => true,
            'is_primary' => true,
            'is_revoked' => true,
            'name' => 'name',
            'expire_date' => 100500,
            'member_limit' => 10,
            'pending_join_request_count' => 10,
        ];
    }

    /**
     * @param ChatInviteLink $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals('invite_link', $item->getInviteLink());
        $this->assertEquals(UserTest::createMinInstance(), $item->getCreator());
        $this->assertTrue($item->getCreatesJoinRequest());
        $this->assertTrue($item->isPrimary());
        $this->assertTrue($item->isRevoked());
        $this->assertNull($item->getName());
        $this->assertNull($item->getExpireDate());
        $this->assertNull($item->getMemberLimit());
        $this->assertNull($item->getPendingJoinRequestCount());
    }

    /**
     * @param ChatInviteLink $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals('invite_link', $item->getInviteLink());
        $this->assertEquals(UserTest::createMinInstance(), $item->getCreator());
        $this->assertTrue($item->getCreatesJoinRequest());
        $this->assertTrue($item->isPrimary());
        $this->assertTrue($item->isRevoked());
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(100500, $item->getExpireDate());
        $this->assertEquals(10, $item->getMemberLimit());
        $this->assertEquals(10, $item->getPendingJoinRequestCount());
    }
}
