<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class UserProfilePhotos
 * This object represent a user's profile pictures.
 *
 * @package TelegramBot\Api\Types
 */
class UserProfilePhotos extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = array('total_count', 'photos');

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
        if (is_integer($totalCount)) {
            $this->totalCount = $totalCount;
        } else {
            throw new InvalidArgumentException();
        }
    }

    public static function fromResponse($data)
    {
        self::validate($data);
        $instance = new self();

        $instance->setTotalCount($data['total_count']);
        $photos = array();
        foreach ($data['photos'] as $key => $photoItems) {
            $tmpPhotos = array();
            foreach ($photoItems as $photoItem) {
                $tmpPhotos[] = PhotoSize::fromResponse($photoItem);
            }
            $photos[] = $tmpPhotos;
        }
        $instance->setPhotos($photos);

        return $instance;
    }
}
