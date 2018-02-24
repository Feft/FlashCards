<?php

namespace Infrastructure;

use Interfaces\ObjectRepositoryInterface;

class FlashCardFileRepository implements ObjectRepositoryInterface
{
    public function findAll():array
    {
        return [];
    }
}
