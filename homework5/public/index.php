<?php
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";


//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
//$params = ['menu' => getMenu()];
switch ($page) {

    case 'index':
        initDb();
        $params['name'] = 'Гость';
        break;

    case 'fullsize':
        $id = (int)$_GET["id"];
        $params['picture'] = getOnePic($id);
        break;

    case 'gallery':
        if ($_POST["send"]) {
            $params["error"] = loadImage();
        }
        $params["images"] = getDbContent();
        break;
}

//пример использования модуля для логирования данных
//можно использовать для отладки, смотреть результат
//в папке _log в public, она будет создана автоматически
_log($params, "params");
//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);