<?php
declare(strict_types=1);

$valid_input = [
    "title" => "А зори здесь тихие",
    "year" => 1972,
    "actors" => ["Андрей Мартынов", "Ольга Остроумова", "Ирина Долганова"],
];

$invalid_input_year = [
    "title" => "А зори здесь тихие",
    "year" => "1972", //<-- !!!
    "actors" => ["Андрей Мартынов", "Ольга Остроумова", "Ирина Долганова"],
];

$invalid_input_actors = [
    "title" => "А зори здесь тихие",
    "year" => 1972,
    "actors" => "Андрей Мартынов, Ольга Остроумова, Ирина Долганова", //<-- !!!
];

$invalid_input_missing_title = [
    //"title" => "А зори здесь тихие", //<-- !!!
    "year" => 1972,
    "actors" => ["Андрей Мартынов", "Ольга Остроумова", "Ирина Долганова"],
];

$invalid_input_extra_data = [
    "title" => "А зори здесь тихие",
    "year" => 1972,
    "actors" => ["Андрей Мартынов", "Ольга Остроумова", "Ирина Долганова"],
    "genres" => ["драма", "военный", "экранизация"], //<-- !!!
];

echo 'is valid $valid_input: '.(is_valid_movie_dto($valid_input) ? 'true' : 'false')."\n";
echo 'is valid $invalid_input_year: '.(is_valid_movie_dto($invalid_input_year) ? 'true' : 'false')."\n";
echo 'is valid $invalid_input_actors: '.(is_valid_movie_dto($invalid_input_actors) ? 'true' : 'false')."\n";
echo 'is valid $invalid_input_missing_title: '.(is_valid_movie_dto($invalid_input_missing_title) ? 'true' : 'false')."\n";
echo 'is valid $invalid_input_extra_data: '.(is_valid_movie_dto($invalid_input_extra_data) ? 'true' : 'false')."\n";


function is_valid_movie_dto(array $arr): bool
{

    if(!is_array($arr) || count($arr) != 3) {
        return false;
    }

    if(!isset($arr['title']) || !isset($arr['year']) || !isset($arr['actors'])) {
        return false;
    }

    if(!is_string($arr['title'])) {
        return false;
    }

    if(!is_int($arr['year'])) {
        return false;
    }

    //https://www.w3resource.com/php-exercises/php-array-exercise-46.php
    if(!is_array($arr['actors']) || array_sum(array_map('is_string', $arr['actors'])) != count($arr['actors'])) {
        return false;
    }

    return true;
}