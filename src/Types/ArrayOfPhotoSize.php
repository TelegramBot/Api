<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class ArrayOfPhotoSize extends BaseType implements TypeInterface, \ArrayAccess, \Iterator
{
    protected $container = [];
    protected $position = 0;

    public static function fromResponse($data)
    {
        $instance = new static();
        foreach ($data as $photoSizeItem) {
            $instance->container[] = PhotoSize::fromResponse($photoSizeItem);
        }

        return $instance;
    }

    public function toJson($inner = false)
    {
        $output = [];

        foreach ($this->container as $photo) {
            $output[] = $photo->toJson(true);
        }

        return $inner === false ? json_encode($output) : $output;
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    function rewind() {
        $this->position = 0;
    }

    function current() {
        return $this->container[$this->position];
    }

    function key() {
        return $this->position;
    }

    function next() {
        ++$this->position;
    }

    function valid() {
        return isset($this->container[$this->position]);
    }
}
