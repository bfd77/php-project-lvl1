<?php

namespace Brain\Games\Games;

use Brain;

class Even extends Brain\Games\Engine
{
    protected function getDescription(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    protected function generateRound(int $iter): array
    {
        $questions = [15, 6, 7];
        $question = $questions[$iter - 1];
        return [
            'question' => $question,
            'answer' => $question % 2 === 0 ? 'yes' : 'no',
        ];
    }
}
