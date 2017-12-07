<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 07.12.17
 * Time: 19:46
 */
namespace Domain;


use PHPUnit\Framework\TestCase;

class FlashCardsCollectionTest extends TestCase
{
    public function testIteratorFunctions()
    {
        $collection = new FlashCardsCollection();
        for ($i = 0; $i < 4; $i++) {
            $fc = new FlashCard();
            $fc->setFlashCardsData((string)$i,(string)$i,$i);
            $collection->addFlashCard($fc);

            $this->assertEquals($i + 1, $collection->getCollectionSize());
        }

        $this->assertEquals(0,$collection->key());
        $collection->next();
        $this->assertEquals(1,$collection->current()->getQuestion());
        $collection->next();
        $this->assertTrue($collection->valid());
        $collection->rewind();
        $this->assertEquals(0,$collection->key());
    }

}