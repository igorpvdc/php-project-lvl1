<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;

function gcd($name, $array1, $array2)
{

    $correctAnswers = 0;

    for ($i = 0, $len = count($array1); $i < $len; $i++) {
        $result = gmp_gcd($array1[$i], $array2[$i]);

        line("Find the greatest common divisor of given numbers.");
        line("Question: {$array1[$i]} {$array2[$i]}");
        $answer = prompt("Your answer: ");

        if ((int) $result === (int) $answer) {
            line("Correct!");
            $correctAnswers++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$result}.");
            line("Lets try again, {$name}!");
            break;
        }
    }

    if ($correctAnswers === 3) {
        line("Congratulations, {$name}!");
    }
}