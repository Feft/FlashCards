<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 07.12.17
 * Time: 19:24
 */
namespace Domain;

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

    public function addFlashCard(FlashCard $fc)
    {
        $this->array[] = $fc;
    }

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
        return count($this->array);
    }
}