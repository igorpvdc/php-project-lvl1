<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\engine;

function calc(): void
{
    $array1 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $array2 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $questionText = "What is the result of the expression?";

    $sign = ['-', '+', '*'];

    $arrayQuestionsAnswers = [];

    for ($i = 0, $len = count($array1); $i < $len; $i++) {
        $randomsign = array_rand($sign);

        if ($randomsign === 0) {
            $question = ["{$array1[$i]} - {$array2[$i]}", $array1[$i] - $array2[$i]];
        } elseif ($randomsign === 1) {
            $question = ["{$array1[$i]} + {$array2[$i]}", $array1[$i] + $array2[$i]];
        } else {
            $question = ["{$array1[$i]} * {$array2[$i]}", $array1[$i] * $array2[$i]];
        }
        $arrayQuestionsAnswers[] = $question;
    }
    engine($arrayQuestionsAnswers, $questionText);
}
