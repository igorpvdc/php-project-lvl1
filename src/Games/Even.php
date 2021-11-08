<?php

namespace Brain\Games\Even;

use function Brain\Games\Cli\greeting;
use function cli\line;
use function cli\prompt;

function isEvenGame($name = '', $array = [])
{
    if ($name !== '' && $array !== []) {
    } else {
        $name = greeting();
        $array = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    }

    $correctAnswers = 0;

    foreach ($array as $int) {
        if ($int % 2 === 0) {
            $isEven = 'yes';
        } else {
            $isEven = 'no';
        }

        line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
        line("Question: $int");
        $answer = prompt("Your answer");

        if ($isEven === $answer) {
            line("Correct!");
            $correctAnswers++;
        } elseif ($answer === 'no' && $isEven === 'yes') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Lets try again, {$name}!");
            break;
        } elseif ($answer === 'yes' && $isEven === 'no') {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Lets try again, {$name}!");
            break;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was 'no'.");
            line("Lets try again, {$name}!");
            break;
        }
    }

    if ($correctAnswers === 3) {
        line("Congratulations, {$name}!");
    }
}
