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
    protected array $items = [];

    /**
     * @var int Max items count, if set 0 - unlimited
     */
    protected int $maxCount = 0;

    /**
     * @param CollectionItemInterface $item
     * @param mixed                   $key
     *
     * @return void
     * @throws ReachedMaxSizeException
     * @throws KeyHasUseException
     */
    public function addItem(CollectionItemInterface $item, $key = null): void
    {
        if ($this->maxCount > 0 && $this->count() + 1 >= $this->maxCount) {
            throw new ReachedMaxSizeException("Maximum collection items count reached. Max size: {$this->maxCount}");
        }

        if ($key === null) {
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
     *
     * @return void
     * @throws KeyInvalidException
     */
    public function deleteItem($key): void
    {
        $this->checkItemKey($key);

        unset($this->items[$key]);
    }

    /**
     * @param $key
     *
     * @return InputMedia
     * @return CollectionItemInterface
     * @throws KeyInvalidException
     */
    public function getItem($key): InputMedia
    {
        $this->checkItemKey($key);

        return $this->items[$key];
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @param bool $inner
     *
     * @return array|string
     * @throws \JsonException
     */
    public function toJson(bool $inner = false)
    {
        $output = [];
        foreach ($this->items as $item) {
            $output[] = $item->toJson(true);
        }

        return $inner === false ? json_encode($output, JSON_THROW_ON_ERROR) : $output;
    }

    /**
     * @param int $maxCount
     *
     * @return void
     */
    public function setMaxCount(int $maxCount): void
    {
        $this->maxCount = $maxCount;
    }

    /**
     * @param $key
     *
     * @throws KeyInvalidException
     */
    private function checkItemKey($key): void
    {
        if (!isset($this->items[$key])) {
            throw new KeyInvalidException("Invalid key $key.");
        }
    }
}
