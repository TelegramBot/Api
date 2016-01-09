<?php

namespace TelegramBot\Api\Test\Types\Inline;

use TelegramBot\Api\Types\Inline\InlineQueryResultArticle;

class InlineQueryResultArticleTest extends \PHPUnit_Framework_TestCase
{

    public function data()
    {
        return [
            [
                'id1',
                'title1',
                'messageText1',
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                true,
                null,
                null,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                null,
                null,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                null,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                true,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                false,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                1,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                0,
                null,
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                true,
                'Custom description',
                null,
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                true,
                'Custom description',
                'https://github.com/iGusev',
                null,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                true,
                'Custom description',
                'https://github.com/iGusev',
                1,
                null,
            ],
            [
                'id1',
                'title1',
                'messageText1',
                'Markdown',
                false,
                'https://github.com/iGusev',
                true,
                'Custom description',
                'https://github.com/iGusev',
                1,
                2,
            ],
        ];
    }

    /**
     * @dataProvider data
     */
    public function testConstructor(
        $id,
        $title,
        $messageText,
        $parseMode,
        $disableWebPagePreview,
        $url,
        $hideUrl,
        $description,
        $thumbUrl,
        $thumbWidth,
        $thumbHeight
    ) {
        $item = new InlineQueryResultArticle($id, $title, $messageText, $parseMode, $disableWebPagePreview, $url,
            $hideUrl, $description, $thumbUrl, $thumbWidth, $thumbHeight);

        $this->assertInstanceOf('\TelegramBot\Api\Types\Inline\InlineQueryResultArticle', $item);
        $this->assertAttributeEquals('article', 'type', $item);
        $this->assertAttributeEquals($id, 'id', $item);
        $this->assertAttributeEquals($title, 'title', $item);
        $this->assertAttributeEquals($messageText, 'messageText', $item);
        $this->assertAttributeEquals($parseMode, 'parseMode', $item);
        $this->assertAttributeEquals($disableWebPagePreview, 'disableWebPagePreview', $item);
        $this->assertAttributeEquals($url, 'url', $item);
        $this->assertAttributeEquals($hideUrl, 'hideUrl', $item);
        $this->assertAttributeEquals($description, 'description', $item);
        $this->assertAttributeEquals($thumbUrl, 'thumbUrl', $item);
        $this->assertAttributeEquals($thumbWidth, 'thumbWidth', $item);
        $this->assertAttributeEquals($thumbHeight, 'thumbHeight', $item);
    }

    public function testConstructor2()
    {

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
        $item->setParseMode('Markdown2');
        $this->assertAttributeEquals('Markdown2', 'parseMode', $item);
    }

    public function testGetParseMode()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1', 'Markdown');
        $item->setParseMode('Markdown2');
        $this->assertEquals('Markdown2', $item->getParseMode());
    }

    public function testSetDisableWebPagePreview()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1', 'Markdown');
        $item->setDisableWebPagePreview(true);
        $this->assertAttributeEquals(true, 'disableWebPagePreview', $item);
    }

    public function testIsDisableWebPagePreview()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1', 'Markdown', true);
        $item->setDisableWebPagePreview(false);
        $this->assertEquals(false, $item->isDisableWebPagePreview());
    }

    public function testSetUrl()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setUrl('https://github.com/iGusev');
        $this->assertAttributeEquals('https://github.com/iGusev', 'url', $item);
    }

    public function testGetUrl()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setUrl('https://github.com/iGusev');
        $this->assertEquals('https://github.com/iGusev', $item->getUrl());
    }

    public function testSetThumbUrl()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setThumbUrl('https://github.com/iGusev');
        $this->assertAttributeEquals('https://github.com/iGusev', 'thumbUrl', $item);
    }

    public function testGetThumbUrl()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setThumbUrl('https://github.com/iGusev');
        $this->assertEquals('https://github.com/iGusev', $item->getThumbUrl());
    }

    public function testSetHideUrl()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setHideUrl(true);
        $this->assertAttributeEquals(true, 'hideUrl', $item);
    }

    public function testIsHideUrl()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setHideUrl(false);
        $this->assertEquals(false, $item->isHideUrl());
    }

    public function testSetDescription()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setDescription('description1');
        $this->assertAttributeEquals('description1', 'description', $item);
    }

    public function testGetDescription()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setDescription('description1');
        $this->assertEquals('description1', $item->getDescription());
    }

    public function testSetThumbWidth()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setThumbWidth(1);
        $this->assertAttributeEquals(1, 'thumbWidth', $item);
    }

    public function testGetThumbWidth()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setThumbWidth(1);
        $this->assertEquals('1', $item->getThumbWidth());
    }

    public function testSetThumbHeight()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setThumbHeight(1);
        $this->assertAttributeEquals(1, 'thumbHeight', $item);
    }

    public function testGetThumbHeight()
    {
        $item = new InlineQueryResultArticle('id1', 'title1', 'messageText1');
        $item->setThumbHeight(1);
        $this->assertEquals('1', $item->getThumbHeight());
    }
}
