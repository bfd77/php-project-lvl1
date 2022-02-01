<?php

namespace Brain\Games\Games;

use Brain;

class Gcd extends Brain\Games\Engine
{
    protected function getDescription(): string
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    protected function generateRound(int $iter): array
    {
        $a = random_int(1, 50);
        $b = random_int(1, 50);
        $question = "{$a} {$b}";
        return [
            'question' => $question,
            'answer' => (string) $this->findGcd($a, $b),
        ];
    }

    private function findGcd(int $a, int $b): int
    {
        $max = max($a, $b);
        $min = min($a, $b);
        $reminder = $max % $min;

        return $reminder === 0 ? $min : $this->findGcd($min, $reminder);
    }
}
