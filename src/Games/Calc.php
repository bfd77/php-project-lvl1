<?php

namespace Brain\Games\Games;

use Brain;

class Calc
{
    public function run()
    {
        $description = 'What is the result of the expression?';

        $generator = function () {
            $a = random_int(0, 100);
            $b = random_int(0, 100);
            $operators = ['+', '-', '*'];
            $operator = $operators[array_rand($operators)];
            $question = "{$a} {$operator} {$b}";
            return [
                'question' => $question,
                'answer' => (string) eval("return {$question};"),
            ];
        };

        $engine = new Brain\Games\Engine();
        $engine->runGame($description, $generator);
    }
}
