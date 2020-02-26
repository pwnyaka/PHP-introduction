<!--<ul>-->
<!--    <li><a href='#'>Меню1</a></li>-->
<!--    <li><a href='#'>Меню2</a></li>-->
<!--    <li><a href='#'>Меню3</a></li>-->
<!--    <li><a href='#'>Меню4</a></li>-->
<!--</ul>-->
<?php
$string = '';
function menu($string) {
    $menu = [
        "Меню1" => ["#", "red"],
        "Меню2" => ["#", "green"],
        "Меню3" => ["#", "blue"],
        "Меню4" => ["#", "orange"],
    ];
    $string .= '<ul>';
    foreach ($menu as $key => $value) {
        $string .= "<li><a style='color: {$value[1]};' href='{$value[0]}'>{$key}</a></li>";
    }
    $string .= '</ul>';
    return $string;
}

echo menu($string);
// Правильно ли я понял, что для вложенного меню подразумевалось соответсвующий массив $menu задавать
// и уже по нему проходить функцией, применяя is_array(), если true, то рекурсивно той же функцией проходить вложенное
// подменю и отрисовывать его
