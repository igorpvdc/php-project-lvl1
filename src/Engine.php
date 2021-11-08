<?php

namespace Brain\Games\Engine;

use function Brain\Games\Calc\calcGame;
use function Brain\Games\Even\isEvenGame;
use function Brain\Games\Gcd\gcdGame;
use function Brain\Games\Progression\progression;
use function Brain\Games\Progression\randomArrayWithProgression;
use function Brain\Games\Prime\primeGame;
use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\greeting;

function engine()
{
    $array1 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $array2 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $array3 = randomArrayWithProgression();
    $array4 = randomArrayWithProgression();
    $array5 = randomArrayWithProgression();

    $name = greeting();
    line('Choose a game you want to play');
    line("\"even\" or \"calc\" or \"gcd\" or \"progression\" or \"prime\"");
    $game = prompt('Your choice is');

    if ($game === 'even') {
        isEvenGame($name, $array1);
    } elseif ($game === 'calc') {
        calcGame($name, $array1, $array2);
    } elseif ($game === 'gcd') {
        gcdGame($name, $array1, $array2);
    } elseif ($game === 'progression') {
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
    } elseif ($game === 'prime') {
        primeGame($name, $array1);
    }
}
