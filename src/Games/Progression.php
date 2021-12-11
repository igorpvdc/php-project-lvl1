<?php

namespace Brain\Games\Progression;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = "What number is missing in the progression?";

function startProgressionGame(): void
{
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $firstNumber = random_int(0, 100);
        $amountOfNumbers = random_int(5, 12);
        $stepOfProgression = random_int(1, 10);
        $lastIndexInArrayWithProgression = $amountOfNumbers - 1;

        $randomArray = randomArrayWithProgression($firstNumber, $amountOfNumbers, $stepOfProgression);
        $gameData[] = createGameData($randomArray, $lastIndexInArrayWithProgression);
    }

    startBrainGame($gameData, QUESTION_TEXT);
}

function createGameData(array $array, int $lastIndexInArrayWithProgression): array
{
    $randomIndex = random_int(0, $lastIndexInArrayWithProgression);

    $correctAnswer = $array[$randomIndex];

    $arrayForUser = implode(' ', hideOneNumberInArray($randomIndex, $array));

    return [$arrayForUser, $correctAnswer];
}

function randomArrayWithProgression(int $firstNumber, int $amountOfNumbers, int $stepOfProgression): array
{
    $arrayWithProgression = [];

    for ($i = $firstNumber; count($arrayWithProgression) <= $amountOfNumbers; $i += $stepOfProgression) {
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
