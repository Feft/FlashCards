<?php

namespace Feft\FlashCards\Tests\Infrastruture;

use PHPUnit\Framework\TestCase;
use Feft\FlashCards\Infrastructure\FileStorageCreator;
use Feft\FlashCards\Infrastructure\FlashCardFileRepository;

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
        // $mock = $this->getMockBuilder(FilesystemIterator::class)
        //     ->setMethods(['isFileStorageIsCreated'])
        //     ->getMock();
    }
}
