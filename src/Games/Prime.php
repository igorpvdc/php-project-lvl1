<?php

namespace Brain\Games\Prime;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function start(): void
{
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number = random_int(1, 100);

        $correctAnswer = isPrime($number) ?  'yes' : 'no';

        $gameData[] = [$number, $correctAnswer];
    }

    startBrainGame($gameData, QUESTION_TEXT);
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
