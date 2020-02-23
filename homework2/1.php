<?php
$a = rand(-10, 10);
$b = rand(-10, 10);
echo "a = $a<br>";
echo "b = $b<br>";
if ($a >= 0 && $b >= 0) {
    $c = $a - $b;
    echo "a - b = {$c}";
} elseif ($a < 0 && $b < 0) {
    $c = $a*$b;
    echo "a * b = {$c}";
} else {
    $c = $a + $b;
    echo "a + b = {$c}";
}