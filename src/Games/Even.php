<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\engine;
use function Brain\Games\Cli\greeting;
use function cli\line;

function evenGame(): void
{
    $name = greeting();

    $question = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

    $data = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];

    $countCorrectAnswers = 0;

    foreach ($data as $int) {
        $correctAnswer = isEven($int);

        if (engine($name, $int, $correctAnswer, $question)) {
            $countCorrectAnswers++;
        } else {
            break;
        }
    }

    if ($countCorrectAnswers === 3) {
        line("Congratulations, {$name}!");
    }
}

function isEven(int $num): string
{
    if ($num % 2 === 0) {
        return 'yes';
    }
    return 'no';
}
