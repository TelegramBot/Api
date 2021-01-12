<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class ChatPhoto extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = [
        'small_file_id',
        'small_file_unique_id',
        'big_file_id',
        'big_file_unique_id'
    ];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'small_file_id' => true,
        'big_file_id' => true,
    ];

    /**
     * File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as
     * long as the photo is not changed.
     *
     * @var string
     */
    protected string $smallFileId;

    /**
     * Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected string $smallFileUniqueId;

    /**
     * Unique file identifier of big (640x640) chat photo. This file_id can be used only for photo download.
     *
     * @var string
     */
    protected string $bigFileId;

    /**
     * Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected string $bigFileUniqueId;

    /**
     * @return string
     */
    public function getSmallFileId(): string
    {
        return $this->smallFileId;
    }

    /**
     * @param string $smallFileId
     */
    public function setSmallFileId(string $smallFileId): void
    {
        $this->smallFileId = $smallFileId;
    }

    /**
     * @return string
     */
    public function getSmallFileUniqueId(): string
    {
        return $this->smallFileUniqueId;
    }

    /**
     * @param string $smallFileUniqueId
     */
    public function setSmallFileUniqueId(string $smallFileUniqueId): void
    {
        $this->smallFileUniqueId = $smallFileUniqueId;
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
     */
    public function setBigFileId(string $bigFileId): void
    {
        $this->bigFileId = $bigFileId;
    }

    /**
     * @return string
     */
    public function getBigFileUniqueId(): string
    {
        return $this->bigFileUniqueId;
    }

    /**
     * @param string $bigFileUniqueId
     */
    public function setBigFileUniqueId(string $bigFileUniqueId): void
    {
        $this->bigFileUniqueId = $bigFileUniqueId;
    }
}
