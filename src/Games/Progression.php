<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\runGame;

function run(): void
{
    runGame(
        description: 'What number is missing in the progression?',
        roundGenerator: function (): array {
            $progression = generateProgression();
            $randIndex = array_rand($progression);
            $answer = $progression[$randIndex];
            $progression[$randIndex] = '..';
            $question = implode(' ', $progression);
            return [
                'question' => $question,
                'answer' => (string) $answer,
            ];
        }
    );
}

function generateProgression(): array
{
    $progressionLength = random_int(5, 10);
    $progressionStart = random_int(1, 100);
    $progressionStep = random_int(1, 5);
    $progressionEnd = $progressionStart + ($progressionLength - 1) * $progressionStep;

    return range($progressionStart, $progressionEnd, $progressionStep);
}
