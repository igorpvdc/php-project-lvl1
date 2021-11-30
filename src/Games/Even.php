<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\NUMBER_OF_ROUNDS_TO_WIN;

function evenGame(): void
{
    $questionText = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number = random_int(1, 100);

        if ($number % 2 === 0) {
            $questionAnswer = [$number, 'yes'];
        } else {
            $questionAnswer = [$number, 'no'];
        }
        $arrayQuestionsAnswers[] = $questionAnswer;
    }

    engine($arrayQuestionsAnswers, $questionText);
}
