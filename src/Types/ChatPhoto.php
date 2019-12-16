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
    static protected $requiredParams = ['small_file_id', 'big_file_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
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
    public function getSmallFileId(): string
    {
        return $this->smallFileId;
    }

    /**
     * @param string $smallFileId
     * @return ChatPhoto
     */
    public function setSmallFileId(string $smallFileId): ChatPhoto
    {
        $this->smallFileId = $smallFileId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBigFileId(): string
    {
        return $this->bigFileId;
    }

    /**
     * @param string $bigFileId
     * @return ChatPhoto
     */
    public function setBigFileId(string $bigFileId): ChatPhoto
    {
        $this->bigFileId = $bigFileId;

        return $this;
    }
}
