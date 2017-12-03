<?php
namespace Tests\Domain;

include_once "autoload.php";

use Domain\LearningManager;
use Interfaces\LearningManagerInterface;
use PHPUnit\Framework\TestCase;

class LearningManagerTest extends TestCase
{
    public function testIfClassExists()
    {
        $learningManager = new LearningManager();
        $this->assertInstanceOf(LearningManager::class, $learningManager);
        $this->assertInstanceOf(LearningManagerInterface::class, $learningManager);
    }
}