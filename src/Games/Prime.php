<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\engine;

function primeGame(): void
{
    $questionText = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $number = random_int(1, 100);

        if (isPrime($number)) {
            $question = [$number, 'yes'];
        } else {
            $question = [$number, 'no'];
        }
        $arrayQuestionsAnswers[] = $question;
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
