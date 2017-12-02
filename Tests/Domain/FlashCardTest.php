<?php
namespace Tests\Domain;

include_once 'autoload.php';

use Domain\FlashCard;
use PHPUnit\Framework\TestCase;

class FlashCardTest extends TestCase
{
    public function testIfClassExists()
    {
        $obj = new FlashCard();
        $this->assertInstanceOf(FlashCard::class, $obj);
    }
}