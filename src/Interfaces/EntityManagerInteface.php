<?php

namespace Feft\FlashCards\Interfaces;

/**
 *  Repository manager
 */
interface EntityManagerInterface 
{
    /**
     * Tells the EntityManager to make an instance managed and persistent.
     * The entity will be entered into the database at or before transaction
     * commit or as a result of the flush operation.
     * 
     * @param object $entity The instance to make managed and persistent.
     * 
     */
    public function persist(object $entity);

    /**
     * Flushes all changes to objects that have been queued up to now to the database. 
     * This effectively synchronizes the in-memory state of managed objects with the database.
     */
    public function flush();

    /**
     * Gets the repository for an entity class.
     * 
     * @param string $entityName The name of the entity.
     * 
     */
    public function getRepository(string $entityName);

}