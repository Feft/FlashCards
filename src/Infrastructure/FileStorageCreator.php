<?php

namespace Feft\FlashCards\Infrastructure;

/**
 * Prepare simple storage in file
 */
class FileStorageCreator
{
    /**
     * @var string
     */
    private $storageFileName;

    private $storageFolder;

    private $storagePath;

    public function __construct()
    {
        $this->storageFolder = 'src/Infrastructure/Storage';
        $this->storageFileName = 'FlashCards.txt';
        $this->storagePath = './' . $this->storageFolder . '/' . $this->storageFileName;
    }

    public function configureFileStorage()
    {
        if ($this->isFileStorageIsCreated() === false) {
            $this->createFileStorage();
        }
    }

    public function getStoragePath()
    {
        return $this->storagePath;
    }

    protected function isFileStorageIsCreated()
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
        $flashCard = $this->getSampleData();

        $jsonData = json_encode($flashCard);

        file_put_contents($this->storagePath, $jsonData, LOCK_EX);
        chmod($this->storagePath, 0755);
    }

    /**
     * @return array sample data
     */
    private function getSampleData():array
    {
        $flashCard[0]["question"] = "niegrzeczny (o dziecku)";
        $flashCard[0]["answer"] = "naughty";
        $flashCard[0]["difficultyLevel"] = 1;

        $flashCard[1]["question"] = "niegrzeczny chłopiec";
        $flashCard[1]["answer"] = "a naughty boy";
        $flashCard[1]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "atak serca";
        $flashCard[]["answer"] = "heart attack";
        $flashCard[]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "chirurg";
        $flashCard[]["answer"] = "surgeon";
        $flashCard[]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "plac (np. w mieście)";
        $flashCard[]["answer"] = "square";
        $flashCard[]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "linijka";
        $flashCard[]["answer"] = "ruler";
        $flashCard[]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "rynek";
        $flashCard[]["answer"] = "market";
        $flashCard[]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "środek";
        $flashCard[]["answer"] = "middle";
        $flashCard[]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "ciężarówka";
        $flashCard[]["answer"] = "truck";
        $flashCard[]["difficultyLevel"] = 1;

        $flashCard[]["question"] = "bagaż";
        $flashCard[]["answer"] = "luggage";
        $flashCard[]["difficultyLevel"] = 1;

        return $flashCard;
    }
}
