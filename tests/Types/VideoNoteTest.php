<?php

namespace TelegramBot\Api\Test\Types;

use TelegramBot\Api\Types\VideoNote;
use PHPUnit\Framework\TestCase;

class VideoNoteTest extends TestCase
{

    public function testSetMimeType()
    {
        $item = (new VideoNote())->setMimeType('video/mp4');

        $this->assertEquals('video/mp4', $item->getMimeType());
    }

    public function testSetLength()
    {
        $item = (new VideoNote())->setLength(55);

        $this->assertEquals(55, $item->getLength());
    }

    public function testSetDuration()
    {
        $item = (new VideoNote())->setDuration(54);

        $this->assertEquals(54, $item->getDuration());
    }

    public function testSetFileSize()
    {
        $item = (new VideoNote())->setFileSize(53);

        $this->assertEquals(53, $item->getFileSize());
    }

    public function testSetFileId()
    {
        $item = (new VideoNote())->setFileId('testid');

        $this->assertEquals('testid', $item->getFileId());
    }
}
