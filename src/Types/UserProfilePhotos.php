<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class UserProfilePhotos extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['total_count', 'photos'];

    /**
     * @var array
     */
    protected static array $map = [
        'total_count' => true,
        'photos' => ArrayOfArrayOfPhotoSize::class,
    ];

    /**
     * Total number of profile pictures the target user has
     *
     * @var int
     */
    protected int $totalCount;

    /**
     * Requested profile pictures (in up to 4 sizes each).
     * Array of Array of \TelegramBot\Api\Types\PhotoSize
     *
     * @var array
     */
    protected array $photos;

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount(int $totalCount): void
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @return array
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * @param array $photos
     */
    public function setPhotos(array $photos): void
    {
        $this->photos = $photos;
    }
}
