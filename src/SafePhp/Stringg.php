<?php
declare(strict_types=1);

namespace SafePhp;

use SafePhp\Interfaces\SafePhpInterface;
use ArrayAccess;
use Iterator;

class Stringg implements SafePhpInterface, ArrayAccess, Iterator
{

    /**
     * @var array
     */
    private $chars;

    /**
     * Stringg constructor.
     * @param string $string
     */
    public function __construct(string $string = '')
    {
        $this->chars = str_split($string);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->chars;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode($this->chars);
    }

    /**
     * @return string
     */
    public function __invoke(): string
    {
        return $this->__toString();
    }

    /**
     * @return int
     */
    public function length(): int
    {
        return count($this->chars);
    }

    /**
     * @param string|int $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->chars[$offset]);
    }

    /**
     * @param string|int $offset
     * @return string
     */
    public function offsetGet($offset): string
    {
        return $this->chars[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        $this->chars[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->chars[$offset]);
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->chars);
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        return next($this->chars);
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->chars);
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid(): bool
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
        reset($this->chars);
    }
}