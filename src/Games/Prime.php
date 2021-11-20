<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\engine;

function primeGame(): void
{
    $array = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];

    $questionText = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    $arrayQuestionsAnswers = [];

    foreach ($array as $int) {
        if (isPrime($int)) {
            $arrayQuestionsAnswers[] = [$int, 'yes'];
        } else {
            $arrayQuestionsAnswers[] = [$int, 'no'];
        }
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
