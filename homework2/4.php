<?php
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

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "sum":
            echo "sum: ". sum($arg1, $arg2) . "<br>";
            break;
        case "div":
            echo "division: ". div($arg1, $arg2) . "<br>";
            break;
        case "multi":
            echo "multiplication: ". multi($arg1, $arg2) . "<br>";
            break;
        case "sub":
            echo "subtraction: ". subtraction($arg1, $arg2) . "<br>";
            break;
    }
}
mathOperation(5, -3, "sum");
mathOperation(25, 5, "div");
mathOperation(25, 0, "div");
mathOperation(2, 4, "multi");
mathOperation(11, 15, "sub");