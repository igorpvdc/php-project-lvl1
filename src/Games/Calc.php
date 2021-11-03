<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

function calc($name, $array1, $array2)
{

    $correctAnswers = 0;
    $sign = ['-', '+', '*'];

    for ($i = 0, $len = count($array1); $i < $len; $i++) {
        $randomsign = array_rand($sign);

        if ($randomsign === 0) {
            $result = $array1[$i] - $array2[$i];
        } elseif ($randomsign === 1) {
            $result = $array1[$i] + $array2[$i];
        } else {
            $result = $array1[$i] * $array2[$i];
        }

        line("What is the result of the expression?");
        line("Question: {$array1[$i]} {$sign[$randomsign]} {$array2[$i]}");
        $answer = prompt("Your answer: ");

        if ($result === (int) $answer) {
            line("Correct");
            $correctAnswers++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$result}.");
            line("Lets try again, {$name}");
            break;
        }
    }

    if ($correctAnswers === 3) {
        line("Congratulations, {$name}!");
    }
}
