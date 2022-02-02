<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\runGame;

function run(): void
{
    runGame(
        description: 'Find the greatest common divisor of given numbers.',
        roundGenerator: function (): array {
            $a = random_int(1, 50);
            $b = random_int(1, 50);
            $question = "{$a} {$b}";
            return [
                'question' => $question,
                'answer' => (string) findGcd($a, $b),
            ];
        }
    );
}

function findGcd(int $a, int $b): int
{
    $max = max($a, $b);
    $min = min($a, $b);
    $reminder = $max % $min;

    return $reminder === 0 ? $min : findGcd($min, $reminder);
}
