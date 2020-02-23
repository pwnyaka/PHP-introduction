<?php
$a = rand(-10,10);
$b = rand(-10,10);
echo "a = $a<br>";
echo "b = $b<br>";

function sum($a, $b) {
    return $a + $b;
}

function subtraction($a, $b) {
    return $a - $b;
}

function div($a, $b) {
    if ($b == 0) {
        return "Error: division by zero";
    } else {
        return $a / $b;
    }
}

function multi($a, $b) {
    return $a * $b;
}
//считаю не лишним уточнить, что глобальные переменные $a и $b отличаю от параметров функции, не смотря на идентичные наименования :)
echo "sum: ". sum($a, $b) . "<br>";
echo "subtraction: ". subtraction($a, $b) . "<br>";
echo "multiplication: ". multi($a, $b) . "<br>";
echo "division: ". div($a, $b) . "<br>";
