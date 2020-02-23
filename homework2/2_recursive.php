<?php
$a = rand(0,15);
echo "a = $a<br>";
function output($a) {
    if ($a <= 15) {
        echo $a++ . "<br>";
        output($a);
    }
}

output($a);