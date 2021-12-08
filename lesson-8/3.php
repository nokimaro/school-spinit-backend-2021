<?php
declare(strict_types=1);

$input_str = "Name:John Doe|Age:39|Hobbies:football,fishing";

$input_array = [
    "Name" => "John Doe",
    "Age" => 39,
    "Hobbies" => ["football", "fishing"],
];

var_dump(splitter($input_str) === $input_array);

var_dump(imploder($input_array) === $input_str);


function splitter(string $str): array
{
    $result_array = [];

    foreach (explode('|', $str) as $part) {

        list($key, $val) = explode(':', $part, 2);

        //explode comma-separated strings to array
        $val = str_contains($val, ',') ? explode(',', $val) : $val;

        //cast numeric strings to int/float type
        $val = is_numeric($val) ? json_decode($val) : $val;

        $result_array[$key] = $val;
    }

    return $result_array;
}

function imploder(array $array): string
{
    $parts = [];
    foreach ($array as $key => $val) {
        $val = is_array($val) ? implode(',', $val) : $val;
        $parts[] = $key.':'.$val;
    }

    return implode('|', $parts);
}