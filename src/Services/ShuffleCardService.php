<?php
namespace Feft\FlashCards\Services;

use Feft\FlashCards\Domain\FlashCardsCollection;
use Feft\FlashCards\Interfaces\ShuffleInterface;

/**
 * Class to shuffle cards collection.
 * If arrays is identical move first element to the end of array.
 */
class ShuffleCardService implements ShuffleInterface
{
    /**
     * @inheritdoc
     *
     * @param FlashCardsCollection $collection
     *
     * @author PP
     * @return void
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
