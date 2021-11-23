<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\engine;

function findGcd(): void
{
    $questionText = "Find the greatest common divisor of given numbers.";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        $question = ["{$number1} {$number2}", gcd($number1, $number2)];
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
