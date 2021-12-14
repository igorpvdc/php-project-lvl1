<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS_TO_WIN = 3;

function startBrainGame(array $gameData, string $questionText): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    foreach ($gameData as [$question, $correctAnswer]) {
        line($questionText);
        line("Question: $question");
        $answer = prompt("Your answer");

        if ($answer !== (string) $correctAnswer) {
            line('"%s" is wrong answer! ;(. Correct answer was "%s".', $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
