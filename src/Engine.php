<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\greeting;
use function Brain\Games\Even\isEven;
use function Brain\Games\Calc\calc;
use function Brain\Games\Gcd\gcd;

function engine()
{
    $array1 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $array2 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];

    $name = greeting();
    line('Choose a game you want to play');
    line('even or calc or gcd');
    $game = prompt('Your choice is: ');

    if ($game === 'even') {
        isEven($name, $array1);
    } elseif ($game === 'calc') {
        calc($name, $array1, $array2);
    } elseif ($game === 'gcd') {
        gcd($name, $array1, $array2);
    }
}
