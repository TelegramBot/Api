<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class UserProfilePhotos
 * This object represent a user's profile pictures.
 *
 * @package TelegramBot\Api\Types
 */
class UserProfilePhotos implements TypeInterface
{
    /**
     * Total number of profile pictures the target user has
     *
     * @var Integer
     */
    protected $totalCount;

    /**
     * Requested profile pictures (in up to 4 sizes each).
     * Array of Array of \TelegramBot\Api\Types\PhotoSize
     *
     * @var array
     */
    protected $photos;

    /**
     * @return array
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param array $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    public static function fromResponse($data)
    {
        $instance = new self();

        if (!isset($data['total_count'], $data['photos'])) {
            throw new InvalidArgumentException();
        }
        $instance->setTotalCount($data['total_count']);
        $photos = [];
        foreach ($data['photos'] as $key => $photoItems) {
            $tmpPhotos = [];
            foreach ($photoItems as $photoItem) {
                $tmpPhotos[] = PhotoSize::fromResponse($photoItem);
            }
            $photos[] = $tmpPhotos;
        }
        $instance->setPhotos($photos);

        return $instance;
    }
}