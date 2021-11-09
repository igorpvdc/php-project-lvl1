<?php

namespace Brain\Games\Progression;

use function Brain\Games\Cli\greeting;
use function cli\line;
use function cli\prompt;

function progressionGame(): void
{
    $array3 = randomArrayWithProgression();
    $array4 = randomArrayWithProgression();
    $array5 = randomArrayWithProgression();

    $name = greeting();

    $result1 = progression($name, $array3);
    if ($result1 === true) {
        $result2 = progression($name, $array4);
        if ($result2 === true) {
            $result3 = progression($name, $array5);
            if ($result3 === true) {
                line("Congratulations, {$name}!");
            }
        }
    }
}

function progression(string $name, array $array): bool
{

    $randomInt = random_int(0, count($array) - 1);

    $result = $array[$randomInt];

    $arrayForUser = implode(' ', hideOneNumberInArray($randomInt, $array));

    line("What number is missing in the progression?");
    line("Question: {$arrayForUser}");
    $answer = prompt("Your answer");

    if ((int) $result === (int) $answer) {
            line("Correct!");
            return true;
    } else {
        line("{$answer} is wrong answer ;(. Correct answer was {$result}.");
        line("Let's try again, {$name}!");
        return false;
    }
}

function randomArrayWithProgression(): array
{
    $randomInt = random_int(0, 100);
    $randomInt2 = random_int(5, 12);
    $randomInt3 = random_int(1, 10);

    $array4 = [];

    for ($i = $randomInt; count($array4) <= $randomInt2; $i = $i + $randomInt3) {
        $array4[] = $i;
    }

    return $array4;
}

function hideOneNumberInArray(int $int, array $array): array
{
    $newArray = [];

    foreach ($array as $value) {
        if ($array[$int] === $value) {
            $newArray[] = '..';
        } else {
            $newArray[] = $value;
        }
    }

    return $newArray;
}
