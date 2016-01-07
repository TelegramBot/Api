<?php

namespace TelegramBot\Api\Test\Types\Inline;

use TelegramBot\Api\Types\Inline\InlineQueryResultArticle;

class InlineQueryResultArticleTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor1()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');

        $this->assertInstanceOf('\TelegramBot\Api\Types\Inline\InlineQueryResultArticle', $item);
        $this->assertAttributeEquals('article', 'type', $item);
        $this->assertAttributeEquals('id1', 'id', $item);
        $this->assertAttributeEquals('title1', 'title', $item);
        $this->assertAttributeEquals('messageText1', 'messageText', $item);
        $this->assertAttributeEquals(null, 'parseMode', $item);
        $this->assertAttributeEquals(null, 'disableWebPagePreview', $item);
        $this->assertAttributeEquals(null, 'url', $item);
        $this->assertAttributeEquals(null, 'hideUrl', $item);
        $this->assertAttributeEquals(null, 'description', $item);
        $this->assertAttributeEquals(null, 'thumbUrl', $item);
        $this->assertAttributeEquals(null, 'thumbWidth', $item);
        $this->assertAttributeEquals(null, 'thumbHeight', $item);
    }

    public function testTypeOnCreate()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');

        $this->assertAttributeEquals('article', 'type', $item);
    }
}
