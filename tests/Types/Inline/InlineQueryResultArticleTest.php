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

    public function testGetType()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');

        $this->assertEquals('article', $item->getType());
    }

    public function testSetId()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setId('id2');
        $this->assertAttributeEquals('id2', 'id', $item);
    }

    public function testGetId()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setId('id2');
        $this->assertEquals('id2', $item->getId());
    }

    public function testSetTitle()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setTitle('title2');
        $this->assertAttributeEquals('title2', 'title', $item);
    }

    public function testGetTitle()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setTitle('title2');
        $this->assertEquals('title2', $item->getTitle());
    }

    public function testSetMessageText()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setMessageText('messageText2');
        $this->assertAttributeEquals('messageText2', 'messageText', $item);
    }

    public function testGetMessageText()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setMessageText('messageText2');
        $this->assertEquals('messageText2', $item->getMessageText());
    }

    public function testSetParseMode()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1', 'Markdown');
        $this->assertAttributeEquals('Markdown', 'parseMode', $item);
        $item->setParseMode('Markdown2');
        $this->assertAttributeEquals('Markdown2', 'parseMode', $item);
    }

    public function testGetParseMode()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1', 'Markdown');
        $item->setParseMode('Markdown2');
        $this->assertEquals('Markdown2', $item->getParseMode());
    }

}
