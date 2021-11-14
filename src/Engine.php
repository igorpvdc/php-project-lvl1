<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\greeting;

function engine(array $arrayQuestionsNumbers, string $questionText): void
{
    $name = greeting();

    $correctAnswers = 0;

    foreach ($arrayQuestionsNumbers as $array) {
        line($questionText);
        line("Question: $array[0]");
        $answer = prompt("Your answer");

        if ($answer == $array[1]) {
            line("Correct!");
            $correctAnswers++;
        } else {
            line("\"{$answer}\" is wrong answer ;(. Correct answer was \"{$array[1]}\".");
            line("Let's try again, {$name}!");
            break;
        }
    }

    if ($correctAnswers === 3) {
        line("Congratulations, {$name}!");
    }
}
