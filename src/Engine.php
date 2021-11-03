<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\greeting;
use function Brain\Games\Even\isEven;
use function Brain\Games\Calc\calc;

function engine()
{
    $array1 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];
    $array2 = [random_int(1, 100), random_int(1, 100), random_int(1, 100)];

    $name = greeting();

    calc($name, $array1, $array2);
}
