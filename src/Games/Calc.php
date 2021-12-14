<?php

namespace Brain\Games\Calc;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = 'What is the result of the expression?';

const SIGNS_FOR_EXPRESSIONS = ['-', '+', '*'];

function start(): void
{
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        $gameData[] = createGameData(array_rand(SIGNS_FOR_EXPRESSIONS), $number1, $number2);
    }

    startBrainGame($gameData, QUESTION_TEXT);
}

/**
 * @throws \Exception
 */
function createGameData(int $randomSign, int $num1, int $num2): array
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
