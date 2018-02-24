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

    public function testFindAllReturnsArray()
    {
        $fileRepository = new FlashCardFileRepository();
        $result = $fileRepository->findAll();
        $this->assertTrue(is_array($result));
    }
}