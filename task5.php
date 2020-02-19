<?php
$a = 1;
$b = 2;
echo "a = $a <br>";
echo "b = $b <br>";

$a += $b;
$b -= $a;
$b = -$b;
$a -= $b;
echo "result a = $a <br>";
echo "result b = $b <br><br>";

//SECOND WAY
echo "XOR using: <br>";
$c = 0b0011; //3
$d = 0b0101; //5
echo "c = $c <br>";
echo "d = $d <br>";

$c = $c ^ $d; // 0110 (6)
$d = $d ^ $c; // 0011 (3)
$c = $c ^ $d; // 0101 (5)
echo "result c = $c <br>";
echo "result d = $d ";

