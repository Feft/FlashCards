<?php

namespace Tests;

use Domain\FlashCard;
use Domain\FlashCardsCollection;

/**
 * Class FlashCardsProvider
 * Common function to test classes.
 */
class FlashCardsProvider
{
    /**
     * Prepare collection of cards.
     *
     * @param int $amount how many cards is needed
     * @author PP
     * @return FlashCardsCollection
     */
    public static function getFlashCards(int $amount): FlashCardsCollection
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