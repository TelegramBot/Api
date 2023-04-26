<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Types\ForumTopicClosed;

class ForumTopicClosedTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return ForumTopicClosed::class;
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
     * @param ForumTopicClosed $item
     * @return void
     */
    protected function assertMinItem($item)
    {
    }

    /**
     * @param ForumTopicClosed $item
     * @return void
     */
    protected function assertFullItem($item)
    {
    }
}
