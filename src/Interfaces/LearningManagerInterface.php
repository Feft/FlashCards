<?php

namespace Feft\FlashCards\Interfaces;

use Feft\FlashCards\Domain\FlashCard;
use Feft\FlashCards\Domain\FlashCardsCollection;

/**
 * LearningManager Interface
 * Features:
 *  - add cards to learning box
 *  - shuffle cards in the learning box
 *  - show next card (question and answer)
 *  - move learned card to learned box
 */
interface LearningManagerInterface
{
    /**
     * Add cards to the learning box.
     *
     * @param $cards FlashCardsCollection Cards to learning
     *
     * @return bool
     */
    public function addCardsToLearningBox(FlashCardsCollection $cards): bool;

    /**
     * Shuffle cards in the learning box.
     */
    public function shuffleCards();

    /**
     * Get card from the learning box.
     *
     * @return FlashCard Card to learning.
     */
    public function getCard(): FlashCard;

    /**
     * Move learned card to learned box.
     *
     * @param $card FlashCard Card to move
     *
     * @return bool
     */
    public function moveCardToLearnedBox(FlashCard $card): bool;
}
