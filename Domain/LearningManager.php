<?php

namespace Domain;

use Interfaces\LearningManagerInterface;

/**
 * Class LearningManager.
 * Features:
 *  - add cards to learning box
 *  - shuffle cards in the learning box
 *  - show next card (question and answer)
 *  - move learned card to learned box
 */
class LearningManager implements LearningManagerInterface
{
    /**
     * @var array
     */
    private $learningBox;

    public function __construct()
    {
        $this->learningBox = [];
    }

    /**
     * Add cards to the learning box.
     *
     * @param $cards array Cards to learning
     *
     * @return bool
     */
    public function addCardsToLearningBox(array $cards): bool
    {
        $this->learningBox = array_merge($this->learningBox, $cards);

        return true;
    }

    /**
     * Shuffle cards in the learning box.
     */
    public function shuffleCards()
    {
        # if array size is 0 or 1 exit from function,
        # because it is not possible to change the order this array
        if (count($this->learningBox) < 2) {
            return;
        }

        # copy of array
        $array = $this->learningBox;
        shuffle($this->learningBox);
        # if arrays is identical move first element to the end
        if (count(array_intersect_assoc($array, $this->learningBox)) !== 0) {
            $element = array_shift($this->learningBox);
            array_push($this->learningBox, $element);
        }
    }

    /**
     * Get card from the learning box.
     *
     * @return FlashCard Card to learning.
     */
    public function getCard(): FlashCard
    {
        return new FlashCard();
    }

    /**
     * Move learned card to learned box.
     *
     * @param $card FlashCard Card to move
     *
     * @return bool
     */
    public function moveCardToLearnedBox(FlashCard $card): bool
    {
        return true;
    }

    /**
     * @return int size of learning box
     */
    public function countLearningBox(): int
    {
        return count($this->learningBox);
    }

    public function getLearningBox()
    {
        return $this->learningBox;
    }
}