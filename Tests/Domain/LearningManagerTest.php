<?php
namespace Tests\Domain;

use Domain\FlashCard;
use Domain\FlashCardsCollection;
use Domain\LearningManager;
use Interfaces\LearningManagerInterface;
use PHPUnit\Framework\TestCase;

class LearningManagerTest extends TestCase
{
    public function testIfClassExists()
    {
        $learningManager = new LearningManager();
        $this->assertInstanceOf(LearningManager::class, $learningManager);
        $this->assertInstanceOf(LearningManagerInterface::class, $learningManager);
    }

    public function testAddingCardsToLearningBox()
    {
        $lm = new LearningManager();
        $collection1 = $this->getFlashCards(3);
        $lm->addCardsToLearningBox($collection1);
        $this->assertEquals($collection1->count(), $lm->countLearningBox());

        $collection2 = $this->getFlashCards(4);
        $lm->addCardsToLearningBox($collection2);
        $this->assertEquals($collection1->count() + $collection2->count(), $lm->countLearningBox());

    }

    public function testShuffleWhenUsedAtLeastTwoElements()
    {
        $lm = new LearningManager();
        $collection1 = $this->getFlashCards(3);
        $lm->addCardsToLearningBox($collection1);
        $lm->shuffleCards();
        # sometimes (eg. when array is small) is possible that shuffle php function
        # doesn't change elements order
        # and hand made order changing is needed
        $collection2 = $this->getFlashCards(3);
        $lm->addCardsToLearningBox($collection2);
        $lm->shuffleCards();

        $this->assertNotEquals($collection1->getArray() + $collection2->getArray(), $lm->getLearningBox()->getArray());
    }

    public function testShuffleWhenUsedTwoElements()
    {
        $lm = new LearningManager();
        $collection1 = $this->getFlashCards(2);
        $lm->addCardsToLearningBox($collection1);
        $lm->shuffleCards();

        $this->assertNotEquals($collection1->getArray(), $lm->getLearningBox()->getArray());
    }

    public function testShuffleWhenUsedLessThanTwoElements()
    {
        $lm = new LearningManager();
        $collection1 = $this->getFlashCards(1);
        $lm->addCardsToLearningBox($collection1);
        $lm->shuffleCards();
        # is not possible to change the order of array
        # so arrays are identical
        $this->assertEquals($collection1->getArray(), $lm->getLearningBox()->getArray());
    }

    public function testDecreaseLearningBoxWhenMoveCardToLearned()
    {
        $amountOfCards = 6;
        $lm = new LearningManager();
        $collection1 = $this->getFlashCards($amountOfCards);
        $lm->addCardsToLearningBox($collection1);
        $elementToLearn = $lm->getCard();
        $this->assertEquals($amountOfCards - 1, $lm->countLearningBox());
        $lm->moveCardToLearnedBox($elementToLearn);
        $this->assertEquals(1, $lm->countLearned());
    }

    /**
     * @author PP
     */
    public function testThrowWhenGetCardFromEmptyLearningBox()
    {
        $this->expectException(\LogicException::class);
        $lm = new LearningManager();
        $lm->getCard();
    }

    /**
     * Prepare collection of cards.
     *
     * @param int $amount how many cards is needed
     * @author PP
     * @return FlashCardsCollection
     */
    private function getFlashCards(int $amount): FlashCardsCollection
    {
        $collection = new FlashCardsCollection();
        for ($i = 0; $i < $amount; $i++) {
            $fc = new FlashCard();
            $fc->setFlashCardsData("q" . ($i + 1), "a" . ($i + 1), $i);
            $collection->addFlashCard($fc);
        }
        return $collection;
    }

}