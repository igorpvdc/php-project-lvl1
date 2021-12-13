<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = 'Find the greatest common divisor of given numbers.';

function start(): void
{
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);

        $gameData[] = ["{$number1} {$number2}", findGcd($number1, $number2)];
    }
    startBrainGame($gameData, QUESTION_TEXT);
}

function findGcd(int $num1, int $num2): int
{
    if ($num2 > 0) {
        return findGcd($num2, $num1 % $num2);
    }
    return abs($num1);
}
