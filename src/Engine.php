<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

class Engine
{
    public function runGame(string $description, callable $roundGenerator): void
    {
        line('Welcome to the Brain Game!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);

        line($description);

        $i = 1;
        while ($i <= ROUNDS_COUNT) {
            ['question' => $question, 'answer' => $answer] = $roundGenerator($i);
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
