<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Test\AbstractTypeTest;
use TelegramBot\Api\Test\Types\Inline\ChosenInlineResultTest;
use TelegramBot\Api\Test\Types\Inline\InlineQueryTest;
use TelegramBot\Api\Test\Types\Payments\Query\PreCheckoutQueryTest;
use TelegramBot\Api\Test\Types\Payments\Query\ShippingQueryTest;
use TelegramBot\Api\Types\Update;

class UpdateTest extends AbstractTypeTest
{
    protected static function getType()
    {
        return Update::class;
    }

    public static function getMinResponse()
    {
        return [
            'update_id' => 10,
        ];
    }

    public static function getFullResponse()
    {
        return [
            'update_id' => 10,
            'message' => MessageTest::getMinResponse(),
            'edited_message' => MessageTest::getMinResponse(),
            'channel_post' => MessageTest::getMinResponse(),
            'edited_channel_post' => MessageTest::getMinResponse(),
            'inline_query' => InlineQueryTest::getMinResponse(),
            'chosen_inline_result' => ChosenInlineResultTest::getMinResponse(),
            'callback_query' => CallbackQueryTest::getMinResponse(),
            'shipping_query' => ShippingQueryTest::getMinResponse(),
            'pre_checkout_query' => PreCheckoutQueryTest::getMinResponse(),
            'poll_answer' => PollAnswerTest::getMinResponse(),
            'poll' => PollTest::getMinResponse(),
        ];
    }

    /**
     * @param $item
     * @return void
     */
    protected function assertMinItem($item)
    {
        $this->assertEquals(10, $item->getUpdateId());
        $this->assertNull($item->getMessage());
        $this->assertNull($item->getEditedMessage());
        $this->assertNull($item->getChannelPost());
        $this->assertNull($item->getEditedChannelPost());
        $this->assertNull($item->getInlineQuery());
        $this->assertNull($item->getChosenInlineResult());
        $this->assertNull($item->getCallbackQuery());
        $this->assertNull($item->getShippingQuery());
        $this->assertNull($item->getPreCheckoutQuery());
        $this->assertNull($item->getPollAnswer());
        $this->assertNull($item->getPoll());
    }

    /**
     * @param $item
     * @return void
     */
    protected function assertFullItem($item)
    {
        $this->assertEquals(10, $item->getUpdateId());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getMessage());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getEditedMessage());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getChannelPost());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getEditedChannelPost());
        $this->assertEquals(InlineQueryTest::createMinInstance(), $item->getInlineQuery());
        $this->assertEquals(ChosenInlineResultTest::createMinInstance(), $item->getChosenInlineResult());
        $this->assertEquals(CallbackQueryTest::createMinInstance(), $item->getCallbackQuery());
        $this->assertEquals(ShippingQueryTest::createMinInstance(), $item->getShippingQuery());
        $this->assertEquals(PreCheckoutQueryTest::createMinInstance(), $item->getPreCheckoutQuery());
        $this->assertEquals(PollAnswerTest::createMinInstance(), $item->getPollAnswer());
        $this->assertEquals(PollTest::createMinInstance(), $item->getPoll());
    }
}
