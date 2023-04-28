<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ChatPhoto extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['small_file_id', 'big_file_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'small_file_id' => true,
        'big_file_id' => true,
    ];

    /**
     * Unique file identifier of small (160x160) chat photo. This file_id can be used only for photo download.
     *
     * @var string
     */
    protected $smallFileId;

    /**
     * Unique file identifier of big (640x640) chat photo. This file_id can be used only for photo download.
     *
     * @var string
     */
    protected $bigFileId;

    /**
     * @return string
     */
    public function getSmallFileId()
    {
        return $this->smallFileId;
    }

    /**
     * @param string $smallFileId
     * @return void
     */
    public function setSmallFileId($smallFileId)
    {
        $this->smallFileId = $smallFileId;
    }

    /**
     * @return string
     */
    public function getBigFileId()
    {
        return $this->bigFileId;
    }

    /**
     * @param string $bigFileId
     * @return void
     */
    public function setBigFileId($bigFileId)
    {
        $this->bigFileId = $bigFileId;
    }
}
