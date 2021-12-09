<?php

namespace Brain\Games\Even;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function startEvenGame(): void
{
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $number = random_int(1, 100);

        if ($number % 2 === 0) {
            $questionAndAnswer = [$number, 'yes'];
        } else {
            $questionAndAnswer = [$number, 'no'];
        }
        $gameData[] = $questionAndAnswer;
    }

    startBrainGame($gameData, QUESTION_TEXT);
}
