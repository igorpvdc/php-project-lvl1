<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\engine;

function evenGame(): void
{
    $questionText = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $number = random_int(1, 100);

        if ($number % 2 === 0) {
            $question = [$number, 'yes'];
        } else {
            $question = [$number, 'no'];
        }
        $arrayQuestionsAnswers[] = $question;
    }

    engine($arrayQuestionsAnswers, $questionText);
}
