<?php

namespace Infrastructure;

use Interfaces\ObjectRepositoryInterface;

class FlashCardFileRepository implements ObjectRepositoryInterface
{
    /**
     * Data stored in storage.
     */
    private $data;

    private $storagePath;

    public function __construct()
    {
        $this->configureFileStorage();
    }

    public function findAll(): array
    {
        # temporary flashcards are in array structure (not as object)
        if (empty($this->data)) {
            $fileContent = file_get_contents($this->storagePath);
            $this->data = json_decode($fileContent, true);
        }

        return $this->data;
    }

    private function configureFileStorage()
    {
        $storageCreator = new FileStorageCreator();
        $storageCreator->configureFileStorage();
        $this->storagePath = $storageCreator->getStoragePath();
    }
}
