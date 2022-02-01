<?php

namespace Brain\Games\Games;

use Brain;

class Even
{
    public function run()
    {
        $description = 'Answer "yes" if the number is even, otherwise answer "no".';

        $generator = function (int $iter) {
            $questions = [15, 6, 7];
            $question = $questions[$iter - 1];
            return [
                'question' => $question,
                'answer' => $question % 2 === 0 ? 'yes' : 'no',
            ];
        };

        $engine = new Brain\Games\Engine();
        $engine->runGame($description, $generator);
    }
}
