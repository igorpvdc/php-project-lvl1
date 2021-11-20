<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\engine;

function findGcd(): void
{
    $array1 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $array2 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $questionText = "Find the greatest common divisor of given numbers.";

    $arrayQuestionsAnswers = [];

    for ($i = 0, $len = count($array1); $i < $len; $i++) {
        $question = ["{$array1[$i]} {$array2[$i]}", gcd($array1[$i], $array2[$i])];
        $arrayQuestionsAnswers[] = $question;
    }
    engine($arrayQuestionsAnswers, $questionText);
}

function gcd(int $num1, int $num2): int
{
    if ($num2 > 0) {
        return gcd($num2, $num1 % $num2);
    } else {
        return abs($num1);
    }
}
