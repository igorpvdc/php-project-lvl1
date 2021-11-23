<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\engine;

function calc(): void
{
    $questionText = "What is the result of the expression?";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        $arrayQuestionsAnswers[] = randomExpression($number1, $number2);
    }

    engine($arrayQuestionsAnswers, $questionText);
}

/**
 * @throws \Exception
 */
function randomExpression(int $num1, int $num2): array
{
    $signs = ['-', '+', '*'];
    $randomSign = array_rand($signs);

    switch ($randomSign) {
        case 0:
            return ["{$num1} - {$num2}", $num1 - $num2];
        case 1:
            return ["{$num1} + {$num2}", $num1 + $num2];
        case 2:
            return ["{$num1} * {$num2}", $num1 * $num2];
        default:
            throw new \Exception('Error');
    }
}
