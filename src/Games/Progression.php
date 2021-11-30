<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\engine;

use const Brain\Games\Engine\NUMBER_OF_ROUNDS_TO_WIN;

function progressionGame(): void
{
    $questionText = "What number is missing in the progression?";
    $arrayQuestionsAnswers = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS_TO_WIN; $i++) {
        $randomArray = randomArrayWithProgression();
        $arrayQuestionsAnswers[] = createArrayWithProgression($randomArray);
    }

    engine($arrayQuestionsAnswers, $questionText);
}

function createArrayWithProgression(array $array): array
{
    $lastIndexOfArray = count($array) - 1;
    $randomIndex = random_int(0, $lastIndexOfArray);

    $result = $array[$randomIndex];

    $arrayForUser = implode(' ', hideOneNumberInArray($randomIndex, $array));

    return [$arrayForUser, $result];
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
