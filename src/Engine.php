<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\greeting;

function engine(string $name, int $int, string $correctAnswer, string $question): bool
{
    line($question);
    line("Question: $int");
    $answer = prompt("Your answer");

    if ($answer === $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
        line("Let's try again, {$name}!");
        return false;
    }
}
