<?php

namespace Infrastructure;

use Interfaces\ObjectRepositoryInterface;

class FlashCardFileRepository implements ObjectRepositoryInterface
{
    /**
     * @var string
     */
    private $storageFileName;

    private $storageFolder;

    private $storagePath;

    /**
     * Data stored in storage.
     */
    private $data;

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

    private function isFileStorageIsCreated()
    {
        if (file_exists($this->storagePath)) {
            return true;
        }
        return false;
    }

    private function createFileStorage()
    {
        if (!file_exists('./' . $this->storageFolder)) {
            mkdir('./' . $this->storageFolder, 0777, true);
        }

        # temporary data
        $flashCard[0]["question"] = "niegrzeczny (o dziecku)";
        $flashCard[0]["answer"] = "naughty";
        $flashCard[0]["difficultyLevel"] = 1;

        $flashCard[1]["question"] = "niegrzeczny chłopiec";
        $flashCard[1]["answer"] = "a naughty boy";
        $flashCard[1]["difficultyLevel"] = 1;

        $jsonData = json_encode($flashCard);

        file_put_contents($this->storagePath, $jsonData, FILE_APPEND | LOCK_EX);
        chmod($this->storagePath, 0755);
    }

    private function configureFileStorage()
    {
        $this->storageFolder = 'Infrastructure/Storage';
        $this->storageFileName = 'FlashCards.txt';
        $this->storagePath = './' . $this->storageFolder . '/' . $this->storageFileName;

        if ($this->isFileStorageIsCreated() === false) {
            $this->createFileStorage();
        }
    }
}
