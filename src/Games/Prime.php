<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\greeting;

function primeGame($name = '', $array = [])
{
    if ($name !== '' && $array !== []) {
    } else {
        $name = greeting();
        $array = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    }

    $correctAnswers = 0;

    foreach ($array as $int) {
        $result = isPrime($int);

        line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
        line("Question: {$int}");
        $answer = prompt("Your answer");

        if (($answer === 'yes' && $result === true) || ($answer === 'no' && $result === false)) {
            line("Correct!");
            $correctAnswers++;
        } elseif ($answer === 'no' && $result === true) {
            line("{$answer} is wrong answer ;(. Correct answer was \"yes\".");
            line("Let's try again, {$name}!");
            break;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was \"no\".");
            line("Let's try again, {$name}!");
            break;
        }
    }

    if ($correctAnswers === 3) {
        line("Congratulations, {$name}!");
    }
}

function isPrime($num): bool
{
    if ($num === 1) {
        return false;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
