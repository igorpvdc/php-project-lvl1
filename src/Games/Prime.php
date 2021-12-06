<?php

namespace Brain\Games\Prime;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

function startPrimeGame(): void
{
    $questionText = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number = random_int(1, 100);

        if (isPrime($number)) {
            $questionAndAnswer = [$number, 'yes'];
        } else {
            $questionAndAnswer = [$number, 'no'];
        }
        $gameData[] = $questionAndAnswer;
    }

    startBrainGame($gameData, $questionText);
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
