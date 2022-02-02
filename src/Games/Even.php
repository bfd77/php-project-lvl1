<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\runGame;

function run(): void
{
    runGame(
        description: 'Answer "yes" if the number is even, otherwise answer "no".',
        roundGenerator: function (int $iter): array {
            $questions = [15, 6, 7];
            $question = $questions[$iter - 1];
            return [
                'question' => $question,
                'answer' => $question % 2 === 0 ? 'yes' : 'no',
            ];
        }
    );
}
