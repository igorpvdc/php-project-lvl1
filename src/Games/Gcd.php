<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\greeting;

function gcdGame($name = '', $array1 = [], $array2 = [])
{
    if ($name !== '' && $array1 !== [] && $array2 !== []) {
    } else {
        $name = greeting();
        $array1 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
        $array2 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    }

    $correctAnswers = 0;

    for ($i = 0, $len = count($array1); $i < $len; $i++) {
        $result = gcd($array1[$i], $array2[$i]);

        line("Find the greatest common divisor of given numbers.");
        line("Question: {$array1[$i]} {$array2[$i]}");
        $answer = prompt("Your answer");

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

function gcd($num1, $num2)
{
    return ($num1 % $num2) ? gcd($num2, $num1 % $num2) : $num2;
}
