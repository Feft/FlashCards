<?php

namespace Feft\FlashCards\Infrastructure;

use Feft\FlashCards\Interfaces\ObjectRepositoryInterface;

class FlashCardFileRepository implements ObjectRepositoryInterface
{
    /**
     * Data stored in storage.
     */
    private $data;

    private $storagePath;

    /**
     * @var FileStorageCreator
     */
    private $fileStorageCreator;

    public function __construct(FileStorageCreator $fileStorageCreator)
    {
        $this->configureFileStorage($fileStorageCreator);
    }

    public function findAll(): array
    {
        # temporary flashcards are in array structure (not as object)
        if (is_null($this->data)) {
            $fileContent = file_get_contents($this->storagePath);
            $this->data = json_decode($fileContent, true);
        }

        return $this->data;
    }

    private function configureFileStorage(FileStorageCreator $fileStorageCreator)
    {
        $fileStorageCreator->configureFileStorage();
        $this->storagePath = $fileStorageCreator->getStoragePath();
    }
}
