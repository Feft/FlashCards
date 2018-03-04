<?php

namespace Feft\FlashCards\Domain;

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

    /**
     * Set flash cards properties.
     *
     * @param string $question
     * @param string $answer
     * @param int $level difficulty level
     */
    public function setFlashCardsData(string $question, string $answer, int $level)
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
