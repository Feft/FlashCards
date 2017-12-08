<?php
namespace Tests\Domain;

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
        $array1 = [0, 1, 2];
        $lm->addCardsToLearningBox($array1);
        $this->assertEquals(count($array1), $lm->countLearningBox());

        $array2 = [0, 1, 2, 3, 4];
        $lm->addCardsToLearningBox($array2);
        $this->assertEquals(count($array1) + count($array2), $lm->countLearningBox());

    }

    public function testShuffleWhenUsedAtLeastTwoElements()
    {
        $lm = new LearningManager();
        $array1 = [14, 15, 16];
        $lm->addCardsToLearningBox($array1);
        $lm->shuffleCards();
        # when array is small is possible that shuffle php function doesn't change elements order
        # and hand made order changing is needed
        $array2 = [14, 15, 16];
        $lm->addCardsToLearningBox($array2);
        $lm->shuffleCards();

        $this->assertNotEquals($array1 + $array2, $lm->getLearningBox());
    }

    public function testShuffleWhenUsedTwoElements()
    {
        $lm = new LearningManager();
        $array1 = [14, 15];
        $lm->addCardsToLearningBox($array1);
        $lm->shuffleCards();

        $this->assertNotEquals($array1, $lm->getLearningBox());
    }

    public function testShuffleWhenUsedLessThanTwoElements()
    {
        $lm = new LearningManager();
        $array1 = [1];
        $lm->addCardsToLearningBox($array1);
        $lm->shuffleCards();
        # is not possible to change the order of array
        # so arrays are identical
        $this->assertEquals($array1, $lm->getLearningBox());
    }

}