<?php

namespace Brain\Games\Progression;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = "What number is missing in the progression?";

function startProgressionGame(): void
{
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $randomArray = randomArrayWithProgression();
        $gameData[] = createGameData($randomArray);
    }

    startBrainGame($gameData, QUESTION_TEXT);
}

function createGameData(array $array): array
{
    $firstIndex = 0;
    $lastIndex = count($array) - 1;
    $randomIndex = random_int($firstIndex, $lastIndex);

    $correctAnswer = $array[$randomIndex];

    $arrayForUser = implode(' ', hideOneNumberInArray($randomIndex, $array));

    return [$arrayForUser, $correctAnswer];
}

function randomArrayWithProgression(): array
{
    $randomInt = random_int(0, 100);
    $randomInt2 = random_int(5, 12);
    $randomInt3 = random_int(1, 10);

    $arrayWithProgression = [];

    for ($i = $randomInt; count($arrayWithProgression) <= $randomInt2; $i = $i + $randomInt3) {
        $arrayWithProgression[] = $i;
    }

    return $arrayWithProgression;
}

function hideOneNumberInArray(int $int, array $array): array
{
    $arrayWithSpacedValue = [];

    foreach ($array as $value) {
        if ($array[$int] === $value) {
            $arrayWithSpacedValue[] = '..';
        } else {
            $arrayWithSpacedValue[] = $value;
        }
    }

    return $arrayWithSpacedValue;
}
