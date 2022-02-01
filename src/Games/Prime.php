<?php

namespace Brain\Games\Games;

use Brain;

class Prime extends Brain\Games\Engine
{
    protected function getDescription(): string
    {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
    }

    protected function generateRound(int $iter): array
    {
        $question = random_int(1, 100);
        $isPrime = $this->isPrimeNumber($question);
        return [
            'question' => $question,
            'answer' => $isPrime ? 'yes' : 'no',
        ];
    }

    private function isPrimeNumber(int $num): bool
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
}
