<?php

declare(strict_types=1);

namespace SafePhp;

use ArrayAccess;
use Iterator;
use SafePhp\Exceptions\IndexOutOfRangeException;
use SafePhp\Exceptions\InvalidTypeException;
use SafePhp\Interfaces\SafePhpInterface;

class Arrayy implements ArrayAccess, Iterator
{

    protected $capacity;

    protected $type;

    protected $args;

    /**
     * Arrayy constructor.
     * @param int $capacity
     * @param string $type
     * @param mixed ...$args
     * @throws IndexOutOfRangeException
     * @throws InvalidTypeException
     */
    public function __construct(int $capacity, string $type, ...$args)
    {
        if (count($args) > $capacity)
            throw new IndexOutOfRangeException(__CLASS__, $capacity);

        $this->type = get_class((new $type));
        $this->capacity = $capacity;
        $this->args = [];

        if (count($args)) {
            foreach ($args as $arg) {
                $this->add($arg);
            }
        }
    }

    /**
     * @param SafePhpInterface $arg
     * @throws IndexOutOfRangeException
     * @throws InvalidTypeException
     */
    public function add(SafePhpInterface $arg): void
    {
        if (count($this->args) === $this->capacity)
            throw new IndexOutOfRangeException(__CLASS__, $this->capacity);

        if (get_class($arg) !== $this->type)
            throw new InvalidTypeException(__CLASS__, $this->type);

        $this->args[] = $arg;
    }

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return bool true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->args[$offset]);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->args[$offset];
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        return $this->args[$offset] = $value;
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->args[$offset]);
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->args);
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        next($this->args);
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->args);
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return ($this->key() !== null);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        reset($this->args);
    }
}