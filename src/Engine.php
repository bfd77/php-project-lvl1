<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

abstract class Engine
{
    private const ROUNDS_COUNT = 3;

    abstract protected function getDescription(): string;

    abstract protected function generateRound(int $iter): array;

    public function run(): void
    {
        line('Welcome to the Brain Game!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);

        line($this->getDescription());

        $i = 1;
        while ($i <= self::ROUNDS_COUNT) {
            ['question' => $question, 'answer' => $answer] = $this->generateRound($i);
            line("Question: {$question}");
            $givenAnswer = prompt('Your answer');
            if ($givenAnswer !== $answer) {
                line("'{$givenAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
                line("Let's try again, {$name}!");
                exit;
            }
            line('Correct!');
            $i++;
        }

        line("Congratulations, {$name}!");
    }
}
