<?php

namespace Domain;

/**
 * Flash card class.
 */
class FlashCard
{
    /**
     * @var string $question Text on first side of card
     */
    private $question;

    /**
     * @var string $answer Text on second side of card
     */
    private $answer;

    /**
     * @var int $difficultyLevel
     */
    private $difficultyLevel;

    public function setFlashCars($question, $answer, $level)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->difficultyLevel = $level;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @return int
     */
    public function getDifficultyLevel(): int
    {
        return $this->difficultyLevel;
    }


}