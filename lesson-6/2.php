<?php
$daysShort = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];
foreach ($daysShort as $day) {
    echo "{$day} -> ".formatDayOfWeek($day)."\n";
}

//Написать функция, которая получает день недели в кратком виде (Пн, Вт и т.д.)
//и переведет их в полный вид (Понедельник, Вторник и т.д.)
function formatDayOfWeek(string $day): string {
    switch (mb_strtolower($day)) {
        case 'пн':
            return 'Понедельник';
        case 'вт':
            return 'Вторник';
        case 'ср':
            return 'Среда';
        case 'чт':
            return 'Четверг';
        case 'пт':
            return 'Питница';
        case 'сб':
            return 'Суббота';
        case 'вс':
        case 'вск':
            return 'Воскресенье';
    }

    throw new \LogicException('Нет такого дня недели `'.trim($day).'`');
}