<?php

namespace Brain\Games\Games;

use Brain;

class Calc extends Brain\Games\Engine
{
    protected function getDescription(): string
    {
        return 'What is the result of the expression?';
    }

    protected function generateRound(int $iter): array
    {
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
}
