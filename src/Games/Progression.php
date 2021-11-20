<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\engine;

function progressionGame(): void
{
    $array3 = randomArrayWithProgression();
    $array4 = randomArrayWithProgression();
    $array5 = randomArrayWithProgression();

    $questionText = "What number is missing in the progression?";

    $arrayQuestionsAnswers[] = progression($array3);
    $arrayQuestionsAnswers[] = progression($array4);
    $arrayQuestionsAnswers[] = progression($array5);

    engine($arrayQuestionsAnswers, $questionText);
}

function progression(array $array): array
{
    $randomInt = random_int(0, count($array) - 1);

    $result = $array[$randomInt];

    $arrayForUser = implode(' ', hideOneNumberInArray($randomInt, $array));

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
