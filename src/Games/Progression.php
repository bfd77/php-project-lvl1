<?php

namespace Brain\Games\Games;

use Brain;

class Progression extends Brain\Games\Engine
{
    protected function getDescription(): string
    {
        return 'What number is missing in the progression?';
    }

    protected function generateRound(int $iter): array
    {
        $progression = $this->generateProgression();
        $randIndex = array_rand($progression);
        $answer = $progression[$randIndex];
        $progression[$randIndex] = '..';
        $question = implode(' ', $progression);
        return [
            'question' => $question,
            'answer' => (string) $answer,
        ];
    }

    private function generateProgression(): array
    {
        $progressionLength = random_int(5, 10);
        $progressionStart = random_int(1, 100);
        $progressionStep = random_int(1, 5);
        $progressionEnd = $progressionStart + ($progressionLength - 1) * $progressionStep;

        return range($progressionStart, $progressionEnd, $progressionStep);
    }
}
