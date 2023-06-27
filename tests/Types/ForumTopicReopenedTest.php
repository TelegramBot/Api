<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ForumTopicReopened;

class ForumTopicReopenedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ForumTopicReopened::class;
    }

    public static function getMinResponse()
    {
        return [];
    }

    public static function getFullResponse()
    {
        return [];
    }

    /**
     * @param ForumTopicReopened $item
     * @return void
     */
    protected function assertMinItem($item)
    {
    }

    /**
     * @param ForumTopicReopened $item
     * @return void
     */
    protected function assertFullItem($item)
    {
    }
}
