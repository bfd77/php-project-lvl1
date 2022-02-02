<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\runGame;

function run(): void
{
    runGame(
        description: 'Answer "yes" if given number is prime. Otherwise answer "no".',
        roundGenerator: function (): array {
            $question = random_int(1, 100);
            $isPrime = isPrimeNumber($question);
            return [
                'question' => $question,
                'answer' => $isPrime ? 'yes' : 'no',
            ];
        }
    );
}

function isPrimeNumber(int $num): bool
{
    $sqrt = sqrt($num);
    $divisor = 2;
    while ($divisor < $sqrt) {
        if ($num % $divisor === 0) {
            return false;
        }
        $divisor++;
    }

    return true;
}
