<?php

namespace Brain\Games\Calc;

use function Brain\Games\Cli\greeting;
use function Brain\Games\Engine\engine;

function calc(): void
{
    $name = greeting();
    $array1 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $array2 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $questionText = "What is the result of the expression?";

    $countCorrectAnswers = 0;
    $sign = ['-', '+', '*'];

    for ($i = 0, $len = count($array1); $i < $len; $i++) {
        $randomsign = array_rand($sign);

        if ($randomsign === 0) {
            $questionNumbers = "{$array1[$i]} - {$array2[$i]}";
            $correctAnswer = $array1[$i] - $array2[$i];
        } elseif ($randomsign === 1) {
            $questionNumbers = "{$array1[$i]} + {$array2[$i]}";
            $correctAnswer = $array1[$i] + $array2[$i];
        } else {
            $questionNumbers = "{$array1[$i]} * {$array2[$i]}";
            $correctAnswer = $array1[$i] * $array2[$i];
        }

        if (engine($name, $questionNumbers, $correctAnswer, $questionText)) {
            $countCorrectAnswers++;
        } else {
            break;
        }
    }

    if ($countCorrectAnswers === 3) {
        echo("Congratulations, {$name}!\n");
    }
}
