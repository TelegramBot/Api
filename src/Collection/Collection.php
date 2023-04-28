<?php

namespace TelegramBot\Api\Collection;

/**
 * @extends \ArrayObject<string|array-key, CollectionItemInterface>
 */
class Collection extends \ArrayObject
{
    /**
     * @var int Max items count, if set 0 - unlimited
     */
    protected $maxCount = 0;

    /**
     * @param CollectionItemInterface[] $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct($items);
    }

    /**
     * @param CollectionItemInterface $item
     * @param mixed $key
     * @return void
     * @throws ReachedMaxSizeException
     * @throws KeyHasUseException
     */
    public function addItem(CollectionItemInterface $item, $key = null)
    {
        if ($this->maxCount > 0 && $this->count() + 1 > $this->maxCount) {
            throw new ReachedMaxSizeException("Maximum collection items count reached. Max size: {$this->maxCount}");
        }

        if ($key == null) {
            $this->append($item);
        } else {
            if ($this->offsetExists($key)) {
                throw new KeyHasUseException("Key $key already in use.");
            }
            $this->offsetSet($key, $item);
        }
    }

    /**
     * @param int|string $key
     * @throws KeyInvalidException
     * @return void
     */
    public function deleteItem($key)
    {
        $this->checkItemKey($key);

        $this->offsetUnset($key);
    }

    /**
     * @param int|string $key
     * @return CollectionItemInterface
     * @throws KeyInvalidException
     */
    public function getItem($key)
    {
        $this->checkItemKey($key);

        return $this->offsetGet($key);
    }

    /**
     * @param bool $inner
     * @return array|string
     */
    public function toJson($inner = false)
    {
        $output = [];
        foreach ($this as $item) {
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
     * @param int|string $key
     *
     * @throws KeyInvalidException
     *
     * @return void
     */
    private function checkItemKey($key)
    {
        if (!$this->offsetExists($key)) {
            throw new KeyInvalidException("Invalid key $key.");
        }
    }
}
