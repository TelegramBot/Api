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
    static protected $requiredParams = ['small_file_id', 'small_file_unique_id', 'big_file_id', 'big_file_unique_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'small_file_id' => true,
        'small_file_unique_id' => true,
        'big_file_id' => true,
        'big_file_unique_id' => true,
    ];

    /**
     * File identifier of small (160x160) chat photo.
     * This file_id can be used only for photo download and only for as long as
     * the photo is not changed.
     *
     * @var string
     */
    protected $smallFileId;

    /**
     * Unique file identifier of small (160x160) chat photo,
     * which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file
     *
     * @var string
     */
    protected $smallFileUniqueId;

    /**
     * File identifier of big (640x640) chat photo.
     * This file_id can be used only for photo download and only for as long as the photo is not changed
     *
     * @var string
     */
    protected $bigFileId;

    /**
     * Unique file identifier of big (640x640) chat photo,
     * which is supposed to be the same over time and for different bots. C
     * an't be used to download or reuse the file
     *
     * @var string
     */
    protected $bigFileUniqueId;

}
