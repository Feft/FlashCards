<?php

namespace Interfaces;

interface ObjectRepositoryInterface 
{
    /**
     * Finds all entities in the repository. 
     * 
     * @return array The entities
     */
    public function findAll():array; 
}