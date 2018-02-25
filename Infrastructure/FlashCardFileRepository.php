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

    public function __construct()
    {
        $this->configureFileStorage();
    }

    public function findAll():array
    {
        $fileContent = file_get_contents($this->storagePath);
        // var_dump($fileContent);

        return [];
    }

    private function isFileStorageIsCreated()
    {
        if(file_exists($this->storagePath)) {
            return true;
        }
        return false;
    }

    private function createFileStorage()
    {
        if (!file_exists('./'.$this->storageFolder)) {
            mkdir('./'.$this->storageFolder, 0777, true);
        }

        # create empty file
        file_put_contents($this->storagePath, "", FILE_APPEND | LOCK_EX);
        chmod($this->storagePath,0755);
    }

    private function configureFileStorage()
    {
        $this->storageFolder = 'Infrastructure/Storage';
        $this->storageFileName = 'FlashCards.txt';
        $this->storagePath = './'.$this->storageFolder.'/'.$this->storageFileName;


        if($this->isFileStorageIsCreated() === false) {
            $this->createFileStorage();
        }
    }
}
