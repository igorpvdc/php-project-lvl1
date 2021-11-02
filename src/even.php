<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven()
{
    $randomInt1 = random_int(0, 100);
    $randomInt2 = random_int(0, 100);
    $randomInt3 = random_int(0, 100);

    $array = [$randomInt1, $randomInt2, $randomInt3];

    $correctAnswers = 0;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    foreach ($array as $int) {
        if ($int % 2 === 0) {
            $isEven = 'yes';
        } else {
            $isEven = 'no';
        }

        line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
        $answer = prompt("Question: {$int}");

        if ($isEven === $answer) {
            echo "Correct", PHP_EOL;
            $correctAnswers++;
        } elseif ($answer === 'no' && $isEven === 'yes') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Lets try again, {$name}");
            break;
        } elseif ($answer === 'yes' && $isEven === 'no') {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Lets try again, {$name}");
            break;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was 'no'.");
            line("Lets try again, {$name}");
            break;
        }
    }

    if ($correctAnswers === 3) {
        echo "Congratulations!, {$name}";
    }
}