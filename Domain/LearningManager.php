<?php

namespace Domain;

use Interfaces\LearningManagerInterface;
use Interfaces\ShuffleInterface;

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
     * @var FlashCardsCollection cards to learn
     */
    private $learningBox;

    /**
     * @var FlashCardsCollection learned cards
     */
    private $learned;

    /**
     * @var ShuffleInterface
     */
    private $shuffleService;


    public function __construct(ShuffleInterface $shuffle)
    {
        $this->learningBox = new FlashCardsCollection();
        $this->learned = new FlashCardsCollection();
        $this->shuffleService = $shuffle;
    }

    /**
     * Add cards to the learning box.
     *
     * @param $cards FlashCardsCollection Cards to learning
     *
     * @return bool
     */
    public function addCardsToLearningBox(FlashCardsCollection $cards): bool
    {
        foreach ($cards as $card) {
            $this->learningBox->addFlashCard($card);
        }

        return true;
    }

    /**
     * Shuffle cards in the learning box.
     */
    public function shuffleCards()
    {
        $this->shuffleService->shuffle($this->learningBox);
    }

    /**
     * Get card from the learning box.
     *
     * @return FlashCard Card to learning.
     * @throws \LogicException if no card in learning box
     */
    public function getCard(): FlashCard
    {
        if ($this->countLearningBox() > 0) {
            return $this->learningBox->removeFirstFlashCard();
        }
        throw new \LogicException("No card in learning box");
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
        $this->learned->addFlashCard($card);
        return true;
    }

    /**
     * @return int size of learning box
     */
    public function countLearningBox(): int
    {
        return $this->learningBox->count();
    }

    public function getLearningBox()
    {
        return $this->learningBox;
    }

    /**
     * Count how much cards are learned.
     *
     * @author PP
     * @return int
     */
    public function countLearned(): int
    {
        return $this->learned->count();
    }
}