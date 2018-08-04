<?php

namespace Feft\FlashCards\Domain;

/**
 * FlashCards Collection
 */
class FlashCardsCollection implements \Iterator
{
    /**
     * @var int
     */
    private $position;
    /**
     * @var array FlashCards collection
     */
    private $array;

    /**
     * FlashCardCollection constructor.
     */
    public function __construct()
    {
        $this->position = 0;
    }

    /**
     * Add new flash card to collection.
     *
     * @param FlashCard $fc flash card to add
     * @author PP
     */
    public function addFlashCard(FlashCard $fc)
    {
        $this->array[] = $fc;
    }

    /**
     * Remove first element from collection,
     * eg. for learning process.
     *
     * @author PP
     * @return FlashCard
     */
    public function removeFirstFlashCard()
    {
        return array_shift($this->array);
    }

    /**
     * Count collection size.
     *
     * @author PP
     * @return int
     */
    public function getCollectionSize()
    {
        return count($this->array);
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return FlashCard
     * @since 5.0.0
     */
    public function current()
    {
        return $this->array[$this->position];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return isset($this->array[$this->position]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Count collection size.
     *
     * @author PP
     * @return int Collection size
     */
    public function count()
    {
        if (is_array($this->array)) {
            return count($this->array);
        }
        return 0;
    }

    /**
     * Return array of cards
     *
     * @author PP
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Shuffle collection.
     *
     * @author PP
     */
    public function shuffle()
    {
        shuffle($this->array);
    }
}
