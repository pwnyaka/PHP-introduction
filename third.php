<?php
$title = "*3rd way* My biography";
$year = "2020";
$info = "Информация обо мне";

$content = file_get_contents("main.tmpl");

$content = str_replace("{{ TITLE }}", $title, $content);
$content = str_replace("{{ INFO }}", $info, $content);
$content = str_replace("{{ YEAR }}", $year, $content); //здесь вместо 3 строк может и, полагаю, должен быть массив

echo $content;
