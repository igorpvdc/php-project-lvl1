<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\engine;
use function Brain\Games\Cli\greeting;

function evenGame(): void
{
    $questionText = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

    $data = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];

    $arrayQuestionsAnswers = [];

    foreach ($data as $int) {
        if ($int % 2 === 0) {
            $question = [$int, 'yes'];
        } else {
            $question = [$int, 'no'];
        }
        $arrayQuestionsAnswers[] = $question;
    }
    engine($arrayQuestionsAnswers, $questionText);
}
