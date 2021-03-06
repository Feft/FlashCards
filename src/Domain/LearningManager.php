<?php

namespace Feft\FlashCards\Domain;

use Feft\FlashCards\Interfaces\LearningManagerInterface;
use Feft\FlashCards\Interfaces\ShuffleInterface;

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
     * @var ShuffleInterface class to shuffle cards
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
     * @author PP
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
     * @author PP
     */
    public function shuffleCards()
    {
        $this->shuffleService->shuffle($this->learningBox);
    }

    /**
     * Get card from the learning box.
     *
     * @author PP
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
     * @author PP
     * @return bool
     */
    public function moveCardToLearnedBox(FlashCard $card): bool
    {
        $this->learned->addFlashCard($card);
        return true;
    }

    /**
     * Count how much to learn.
     *
     * @author PP
     * @return int size of learning box
     */
    public function countLearningBox(): int
    {
        return $this->learningBox->count();
    }

    /**
     * Get collection cards to learn.
     *
     * @author PP
     * @return FlashCardsCollection
     */
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
