<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function run(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $nums = [15, 6, 7];
    foreach ($nums as $num) {
        line("Question: {$num}");
        $answer = prompt('Your answer');
        $correctAnswer = $num % 2 === 0 ? 'yes' : 'no';
        if ($answer !== $correctAnswer) {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, {$name}!");
            exit;
        }
        line('Correct!');
    }

    line("Congratulations, {$name}!");
}
