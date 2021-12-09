<?php

namespace Brain\Games\Calc;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = "What is the result of the expression?";

function startCalcGame(): void
{
    $gameData = [];
    $signs = ['-', '+', '*'];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        $gameData[] = randomExpression(array_rand($signs), $number1, $number2);
    }

    startBrainGame($gameData, QUESTION_TEXT);
}

/**
 * @throws \Exception
 */
function randomExpression(int $randomSign, int $num1, int $num2): array
{
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
