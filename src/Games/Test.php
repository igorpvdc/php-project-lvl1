<?php

namespace Brain\Games\Test;

use function cli\line;
use function cli\prompt;

$randomInt = random_int(0, 100);
$randomInt2 = random_int(5, 12);
$randomInt3 = random_int(1, 10);

$array4 = [];

for ($i = $randomInt; count($array4) <= $randomInt2; $i = $i + $randomInt3) {
    $array4[] = $i;
}

return $array4;
