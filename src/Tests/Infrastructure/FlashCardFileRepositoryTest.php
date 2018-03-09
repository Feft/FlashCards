<?php

namespace Feft\FlashCards\Tests\Infrastruture;

use Feft\FlashCards\Infrastructure\FileStorageCreator;
use Feft\FlashCards\Infrastructure\FlashCardFileRepository;
use PHPUnit\Framework\TestCase;

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

    public function testFindAllReturnsArrayIfLocalStorageIsCreated()
    {
        $stub = $this->getMockBuilder(FileStorageCreator::class)
            ->enableOriginalConstructor()
            ->setMethods(['isFileStorageIsCreated'])
            ->getMock();

        $stub->method('isFileStorageIsCreated')
            ->willReturn(false);

        $fileRepository = new FlashCardFileRepository($stub);
        $result = $fileRepository->findAll();
        $this->assertTrue(is_array($result));
    }
}
