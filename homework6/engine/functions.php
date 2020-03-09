<?php
//Файл с функциями нашего движка


//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{
    if ($page == 'add') {
        return renderTemplate($page, $params);
    } else {
        return renderTemplate(LAYOUTS_DIR . 'main',
            [
                'menu' => renderTemplate('menu'),
                'content' => renderTemplate($page, $params)
            ]
        );
    }
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = [])
{
    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";

    if (!is_null($params)) {
        extract($params);
    }

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Такой {$fileName} страницы не существует. 404");
    }

    return ob_get_clean();
}

function prepareVariables($page, $action) {
    $params = [];
    switch ($page) {

        case 'index':
            initDb();
            $params['name'] = 'Уважаемый гость';
            break;

        case 'product':
            $id = (int)$_GET["id"];
            $params['product'] = getProduct($id);
            break;

        case 'catalog':
            if ($_POST["send"]) {
                $params["error"] = loadImage();
            }
            $params["images"] = getDbContent();
            break;

        case 'feedback':
            $params["action"] = 'add';
            $params["buttonText"] = 'Отправить отзыв';
            doFeedbackAction($params, $action);
            $params["feedback"] = getAllFeedback();
            break;

        case 'add':
            $params["result"] = doOperation();
            break;

        case 'calculator':
            $params = calculate();
            break;
    }
    return $params;
}