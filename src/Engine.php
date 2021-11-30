<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS_TO_WIN = 3;

function engine(array $arrayQuestionsAnswers, string $questionText): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $correctAnswersOfUser = 0;

    foreach ($arrayQuestionsAnswers as [$questionNumbers, $correctAnswer]) {
        line($questionText);
        line("Question: $questionNumbers");
        $answer = prompt("Your answer");

        if ($answer == $correctAnswer) {
            line("Correct!");
            $correctAnswersOfUser++;
        } else {
            line("\"{$answer}\" is wrong answer ;(. Correct answer was \"{$correctAnswer}\".");
            line("Let's try again, {$name}!");
            break;
        }
    }

    if ($correctAnswersOfUser === NUMBER_OF_ROUNDS_TO_WIN) {
        line("Congratulations, {$name}!");
    }
}
