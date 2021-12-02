<?php
declare(strict_types=1);

while(true) {
    echo "Calculate area of a △\n";
    $a = readline("Enter side `a` of △: ");
    $b = readline("Enter side `b` of △: ");
    $c = readline("Enter side `c` of △: ");

    try {
        printf(
            "\e[32m"."Area of a △ is: %s"."\e[0m\n",
            areaOf△((float)$a, (float)$b, (float)$c)
        );
    } catch (\Throwable $e) {
        printf("\e[31m"."Error: %s"."\e[0m\n", $e->getMessage());
    }
    echo "\n";
}

//Написать функцию, которая найдет площадь треугольника по формуле Герона.
//В функции учесть варианты, при котором треугольник не может быть построен.
function areaOf△(int|float $a, int|float $b, int|float $c): float {

//    if($a <= 0 || $b <= 0 || $c <=0) {
//        throw new \InvalidArgumentException('$a, $b, $c must be greater then `0`');
//    }

    //https://www.geeksforgeeks.org/check-whether-triangle-valid-not-sides-given/
    if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
        throw new \InvalidArgumentException('△ is Invalid');
    }

    //https://en.wikipedia.org/wiki/Heron%27s_formula
    $p = ($a + $b + $c) / 2;
    printf("  p = (%s + %s + %s) / 2 = %s\n", $a, $b, $c, $p);

    $s = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
    printf("  s = SQRT( %s * (%s - %s) * (%s - %s) * (%s - %s) ) = %s\n", $p, $p, $a, $p, $b, $p, $c, $s);

    return round($s, 3);
}