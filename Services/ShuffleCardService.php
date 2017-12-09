<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 09.12.17
 * Time: 14:45
 */
namespace Services;

use Domain\FlashCardsCollection;

/**
 * Class to shuffle cards collection
 */
class ShuffleCardService
{
    /**
     * Shuffle cards in the learning box.
     *
     * @param FlashCardsCollection $collection Cards to shuffle
     * @author PP
     */
    public function shuffle(FlashCardsCollection $collection)
    {
        if ($collection->count() < 2) {
            return;
        }

        $array = $collection->getArray();
        $collection->shuffle();

        # if arrays is identical move first element to the end
        # because when array is small is possible that shuffle php function
        # doesn't change elements order and hand made order changing is needed
        if ($array === $collection->getArray()) {
            $element = $collection->removeFirstFlashCard();
            $collection->addFlashCard($element);
        }
    }
}