<?php

namespace Interfaces;

use Domain\FlashCard;

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
     * @param $cards array Cards to learning
     *
     * @return bool
     */
    public function addCardsToLearningBox(array $cards): bool;

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