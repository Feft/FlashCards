<?php
namespace Tests\Domain;

use Domain\FlashCard;
use PHPUnit\Framework\TestCase;

class FlashCardTest extends TestCase
{
    public function testIfClassExists()
    {
        $obj = new FlashCard();
        $this->assertInstanceOf(FlashCard::class, $obj);
    }

    public function testSetterFlashCardFields()
    {
        $fc = new FlashCard();
        $q = "Polska";
        $a = "Poland";
        $level = 1;
        $fc->setFlashCardsData($q, $a, $level);
        $this->assertEquals($q, $fc->getQuestion());
        $this->assertEquals($a, $fc->getAnswer());
        $this->assertEquals($level, $fc->getDifficultyLevel());
    }
}
