<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\NUMBER_OF_ROUNDS_TO_WIN;

function primeGame(): void
{
    $questionText = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number = random_int(1, 100);

        if (isPrime($number)) {
            $questionAnswer = [$number, 'yes'];
        } else {
            $questionAnswer = [$number, 'no'];
        }
        $arrayQuestionsAnswers[] = $questionAnswer;
    }

    engine($arrayQuestionsAnswers, $questionText);
}

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
