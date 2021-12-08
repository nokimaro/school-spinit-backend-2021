<?php
declare(strict_types=1);

function multiplier_foreach(array $input): array
{
    $result = [];
    foreach ($input as $val) {
        $result[] = $val % 2 == 0 ? ($val * 3) : ($val * 4);
    }

    return $result;
}

function multiplier_map(array $input): array
{
    return array_map(
        fn($val) => $val % 2 == 0 ? ($val * 3) : ($val * 4),
        $input
    );
}

var_dump(multiplier_foreach([1,2,3,10]));
var_dump(multiplier_map([1,2,3,10]));