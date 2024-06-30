<?php

namespace TelegramBot\Api\Test\Collection;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Collection\CollectionItemInterface;
use TelegramBot\Api\Collection\KeyHasUseException;
use TelegramBot\Api\Collection\KeyInvalidException;
use TelegramBot\Api\Collection\ReachedMaxSizeException;
use TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia;
use TelegramBot\Api\Types\InputMedia\InputMediaPhoto;

class CollectionTest extends TestCase
{
    protected $itemsOutput = [
        [
            'type' => 'photo',
            'media' => 'link'
        ]
    ];

    public function testAddItem()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'));

        $this->assertSame(1, $media->count());
    }

    public function testAddItemWithKey()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'), 'key');

        $this->assertSame(1, $media->count());
    }

    public function testAddItemWithDuplicateKey()
    {
        $this->expectException(KeyHasUseException::class);

        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'), 'key');
        $media->addItem(new InputMediaPhoto('link'), 'key');
    }

    public function testGetItem()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'), 'key');

        $this->assertInstanceOf(CollectionItemInterface::class, $media->getItem('key'));
    }

    public function testGetInvalidItem()
    {
        $this->expectException(KeyInvalidException::class);

        $media = new ArrayOfInputMedia();
        $media->getItem('key');
    }

    public function testDeleteItem()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'), 'key');
        $media->deleteItem('key');

        $this->assertSame(0, $media->count());
    }

    public function testCount()
    {
        $media = new ArrayOfInputMedia();
        $media->setMaxCount(5);
        for ($i = 0; $i < 5; $i++) {
            $media->addItem(new InputMediaPhoto('link'));
        }
        $this->assertSame(5, $media->count());
    }

    public function testCantAddMoreThenMaxLimit()
    {
        $this->expectException(ReachedMaxSizeException::class);
        $media = new ArrayOfInputMedia();
        $media->setMaxCount(2);
        $media->addItem(new InputMediaPhoto('link'));
        $media->addItem(new InputMediaPhoto('link'));
        $media->addItem(new InputMediaPhoto('link'));
    }
}
