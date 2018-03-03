<?php

namespace Tests\Infrastruture;

use PHPUnit\Framework\TestCase;
use Infrastructure\FlashCardFileRepository;
use Infrastructure\FileStorageCreator;

class FlashCardFileRepositoryTest extends TestCase
{
    public function testIfRepositoryExists()
    {
        $obj = new FlashCardFileRepository(new FileStorageCreator());
        $this->assertInstanceOf(FlashCardFileRepository::class, $obj);
    }

    public function testFindAllReturnsArray()
    {
        $fileRepository = new FlashCardFileRepository(new FileStorageCreator());
        $result = $fileRepository->findAll();
        $this->assertTrue(is_array($result));
    }
}