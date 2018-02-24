<?php

namespace Tests\Infrastruture;

use PHPUnit\Framework\TestCase;
use Infrastructure\FlashCardFileRepository;

class FlashCardFileRepositoryTest extends TestCase
{
    public function testIfRepositoryExists()
    {
        $obj = new FlashCardFileRepository();
        $this->assertInstanceOf(FlashCardFileRepository::class, $obj);
    }
}