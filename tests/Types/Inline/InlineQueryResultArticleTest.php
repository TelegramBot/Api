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

}
