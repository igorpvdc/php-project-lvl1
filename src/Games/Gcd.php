<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\NUMBER_OF_ROUNDS_TO_WIN;

function findGcd(): void
{
    $questionText = "Find the greatest common divisor of given numbers.";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        $questionAnswer = ["{$number1} {$number2}", gcd($number1, $number2)];
        $arrayQuestionsAnswers[] = $questionAnswer;
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
