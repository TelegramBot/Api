<?php

namespace TelegramBot\Api\Collection;

use TelegramBot\Api\Types\InputMedia\InputMedia;

/**
 * Class Collection
 */
class Collection
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var int Max items count, if set 0 - unlimited
     */
    protected $maxCount = 0;

    /**
     * @param CollectionItemInterface $item
     * @param mixed $key
     * @return void
     * @throws ReachedMaxSizeException
     * @throws KeyHasUseException
     */
    public function addItem(CollectionItemInterface $item, $key = null)
    {
        if ($this->maxCount > 0 && $this->count() + 1 >= $this->maxCount) {
            throw new ReachedMaxSizeException("Maximum collection items count reached. Max size: {$this->maxCount}");
        }

        if ($key == null) {
            $this->items[] = $item;
        } else {
            if (isset($this->items[$key])) {
                throw new KeyHasUseException("Key $key already in use.");
            }
            $this->items[$key] = $item;
        }
    }

    /**
     * @param $key
     * @throws KeyInvalidException
     * @return void
     */
    public function deleteItem($key)
    {
        $this->checkItemKey($key);

        unset($this->items[$key]);
    }

    /**
     * @param $key
     * @return InputMedia
     * @return CollectionItemInterface
     * @throws KeyInvalidException
     */
    public function getItem($key)
    {
        $this->checkItemKey($key);

        return $this->items[$key];
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @param bool $inner
     * @return array|string
     */
    public function toJson($inner = false)
    {
        $output = [];
        foreach ($this->items as $item) {
            $output[] = $item->toJson(true);
        }

        return $inner === false ? json_encode($output) : $output;
    }

    /**
     * @param int $maxCount
     * @return void
     */
    public function setMaxCount($maxCount)
    {
        $this->maxCount = $maxCount;
    }

    /**
     * @param $key
     * @throws KeyInvalidException
     */
    private function checkItemKey($key)
    {
        if (!isset($this->items[$key])) {
            throw new KeyInvalidException("Invalid key $key.");
        }
    }
}
