<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\runGame;

function run(): void
{
    runGame(
        description: 'What is the result of the expression?',
        roundGenerator: function (): array {
            $a = random_int(0, 100);
            $b = random_int(0, 100);
            $operators = ['+', '-', '*'];
            $operator = $operators[array_rand($operators)];
            $question = "{$a} {$operator} {$b}";
            return [
                'question' => $question,
                'answer' => (string) eval("return {$question};"),
            ];
        }
    );
}
