<?php
session_start();

//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";


//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index

$url_array = explode("/", $_SERVER['REQUEST_URI']);

$action = $url_array[2];
if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

$params = prepareVariables($page, $action);

if (is_auth()) {
    $params['auth'] = true;
    $params['user'] = get_user();
}

//пример использования модуля для логирования данных
//можно использовать для отладки, смотреть результат
//в папке _log в public, она будет создана автоматически
_log($params, "params");
//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);