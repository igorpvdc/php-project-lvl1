<?php

namespace Brain\Games\Progression;

use function Brain\Engine\startBrainGame;

use const Brain\Engine\NUMBER_OF_ROUNDS_TO_WIN;

const QUESTION_TEXT = 'What number is missing in the progression?';

function start(): void
{
    $gameData = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $firstNumber = random_int(0, 100);
        $amountOfNumbers = random_int(5, 12);
        $stepOfProgression = random_int(1, 10);
        $lastIndexInArrayWithProgression = $amountOfNumbers - 1;

        $progression = createProgression($firstNumber, $amountOfNumbers, $stepOfProgression);
        $gameData[] = createGameData($progression, $lastIndexInArrayWithProgression);
    }

    startBrainGame($gameData, QUESTION_TEXT);
}

function createGameData(array $progression, int $progressionLength): array
{
    $randomIndex = random_int(0, $progressionLength);

    $correctAnswer = $progression[$randomIndex];

    $question = implode(' ', hideOneNumberInProgression($randomIndex, $progression));

    return [$question, $correctAnswer];
}

function createProgression(int $firstNumber, int $amountOfNumbers, int $stepOfProgression): array
{
    $progression = [];

    for ($i = $firstNumber; count($progression) <= $amountOfNumbers; $i += $stepOfProgression) {
        $progression[] = $i;
    }

    return $progression;
}

function hideOneNumberInProgression(int $indexToHide, array $progression): array
{
    $progressionWithSpacedValue = [];

    foreach ($progression as $value) {
        if ($progression[$indexToHide] === $value) {
            $progressionWithSpacedValue[] = '..';
        } else {
            $progressionWithSpacedValue[] = $value;
        }
    }

    return $progressionWithSpacedValue;
}
