<?php

namespace Services;

use Domain\FlashCardsCollection;
use PHPUnit\Framework\TestCase;
use Tests\FlashCardsProvider;

class ShuffleCardServiceTest extends TestCase
{
    public function testShuffleWhenUsedAtLeastTwoElements()
    {
        $service = new ShuffleCardService();
        $collection1 = $this->getFlashCards(3);
        $copy = $collection1;
        $service->shuffle($collection1);
        $this->assertNotEquals($collection1->getArray(), $copy);
    }

    public function testShuffleWhenUsedTwoElements()
    {
        $service = new ShuffleCardService();
        $collection1 = $this->getFlashCards(2);
        $copy = $collection1;
        $service->shuffle($collection1);

        $this->assertNotEquals($collection1->getArray(), $copy);
    }

    public function testShuffleWhenUsedLessThanTwoElements()
    {
        $service = new ShuffleCardService();
        $collection1 = $this->getFlashCards(1);
        $copy = $collection1;
        $service->shuffle($collection1);
        # is not possible to change the order of array
        # so arrays are identical
        $this->assertEquals($collection1->getArray(), $copy->getArray());
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
        return FlashCardsProvider::getFlashCards($amount);
    }
}
