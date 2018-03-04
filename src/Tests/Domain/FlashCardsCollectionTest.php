<?php
namespace Feft\FlashCards\Test\Domain;

use PHPUnit\Framework\TestCase;
use Feft\FlashCards\Domain\FlashCardsCollection;
use Feft\FlashCards\Domain\FlashCard;

class FlashCardsCollectionTest extends TestCase
{
    public function testIteratorFunctions()
    {
        $collection = new FlashCardsCollection();
        for ($i = 0; $i < 4; $i++) {
            $collection->addFlashCard($this->prepareFlashCard((string)$i));

            $this->assertEquals($i + 1, $collection->getCollectionSize());
        }

        $this->assertEquals(0, $collection->key());
        $collection->next();
        $this->assertEquals("q: 1", $collection->current()->getQuestion());
        $collection->next();
        $this->assertTrue($collection->valid());
        $collection->rewind();
        $this->assertEquals(0, $collection->key());
    }

    public function testRemoveFirstElementFromCollection()
    {
        $collection = new FlashCardsCollection();
        for ($i = 0; $i < 3; $i++) {
            $collection->addFlashCard($this->prepareFlashCard((string)$i));
        }
        $element = $collection->removeFirstFlashCard();
        $this->assertEquals(2, $collection->getCollectionSize());
        $this->assertEquals("q: 0", $element->getQuestion());
        $element = $collection->removeFirstFlashCard();
        $this->assertEquals("q: 1", $element->getQuestion());
        $element = $collection->removeFirstFlashCard();
        $this->assertEquals("q: 2", $element->getQuestion());
        # expected empty collection
        $this->assertEquals(0, $collection->getCollectionSize());
    }

    /**
     * Prepare card
     *
     * @param string $text text to set as question and answer
     * @author PP
     * @return FlashCard
     */
    private function prepareFlashCard(string $text): FlashCard
    {
        $fc = new FlashCard();
        $fc->setFlashCardsData("q: " . $text, "a: " . $text, 1);
        return $fc;
    }
}
