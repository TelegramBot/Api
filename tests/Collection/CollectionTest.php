<?php

namespace TelegramBot\Api\Test\Collection;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Collection\CollectionItemInterface;
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

    /** @test */
    public function can_add_item()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'));

        $this->assertSame(1, $media->count());
    }

    /** @test */
    public function can_add_item_with_key()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'), 'key');

        $this->assertSame(1, $media->count());
    }

    /** @test */
    public function can_get_item()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'), 'key');

        $this->assertInstanceOf(CollectionItemInterface::class, $media->getItem('key'));
    }

    /** @test */
    public function can_delete_item()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'), 'key');
        $media->deleteItem('key');

        $this->assertSame(0, $media->count());
    }

    /** @test */
    public function check_count()
    {
        $media = new ArrayOfInputMedia();
        for ($i = 0; $i < 5; $i++) {
            $media->addItem(new InputMediaPhoto('link'));
        }
        $this->assertSame(5, $media->count());
    }

    /** @test */
    public function can_not_add_more_then_max_limit()
    {
        $this->expectException(ReachedMaxSizeException::class);
        $media = new ArrayOfInputMedia();
        $media->setMaxCount(2);
        for ($i = 1; $i < 3; $i++) {
            $media->addItem(new InputMediaPhoto('link'));
        }
    }

    /** @test */
    public function can_output_items_as_array()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'));

        $this->assertSame($this->itemsOutput, $media->toJson(true));
    }

    /** @test */
    public function can_output_items_as_json()
    {
        $media = new ArrayOfInputMedia();
        $media->addItem(new InputMediaPhoto('link'));

        $this->assertSame(json_encode($this->itemsOutput), $media->toJson());
    }
}
