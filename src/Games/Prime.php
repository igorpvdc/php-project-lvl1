<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function prime($name, $array)
{

    $correctAnswers = 0;

    foreach ($array as $int) {
        $result = gmp_prob_prime($int);

        line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
        line("Question: {$int}");
        $answer = prompt("Your answer");

        if (($answer === 'yes' && ($result === 1 || $result === 2)) || ($answer === 'no' && $result === 0)) {
            line("Correct!");
            $correctAnswers++;
        } elseif ($answer === 'no' && ($result === 1 || $result === 2)) {
            line("{$answer} is wrong answer ;(. Correct answer was \"yes\".");
            line("Lets try again, {$name}!");
            break;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was \"no\".");
            line("Lets try again, {$name}!");
            break;
        }
    }

    if ($correctAnswers === 3) {
        line("Congratulations, {$name}!");
    }
}
