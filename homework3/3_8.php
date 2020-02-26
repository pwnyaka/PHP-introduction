<?php
$geo = [
    "Московская область" => ["Москва", "Кашира", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Касимов", "Ряжск", "Шацк"]
];
foreach ($geo as $key => $value) {
    echo "{$key}:<br>";
    $string = '';
    foreach ($value as $index => $item) {
        $string .= $item . ", ";
    }
    $string = mb_substr($string,0,-2);
    echo $string . "<br>";
}
echo "<br><br>";

//Отсеиваем города, начинающиеся на букву К

foreach ($geo as $key => $value) {
    echo "{$key}:<br>";
    $string = '';
    foreach ($value as $index => $item) {
        if (mb_substr($item,0,1) === "К") {
            $string .= $item . ", ";
        }
    }
    $string = mb_substr($string,0,-2);
    echo $string . "<br>";
}