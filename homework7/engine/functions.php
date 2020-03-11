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
                'menu' => renderTemplate('menu', $params),
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
    $params["count"] = getBasketCount();
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

        case 'basket':
            $params["basketSum"] = getBasketSum();
            $params["basket"] = getBasket();
            break;

        case 'api':
            if ($action == 'buy') {
                $postData = file_get_contents('php://input');
                $data = json_decode($postData, true);
                addProduct($data["id"]);
                echo json_encode(["count" => getBasketCount()]);
                die();
            } elseif ($action = 'delete') {
                $postData = file_get_contents('php://input');
                $data = json_decode($postData, true);
                deleteProduct($data["id"]);
                echo json_encode(["count" => getBasketCount(), "basketSum" => getBasketSum(), "productSum" => getProductSum($data["id"]),
                    "id" => $data["id"]]);
                die();
            }
            break;

        case 'feedback':
            $params["action"] = 'add';
            $params["buttonText"] = 'Отправить отзыв';
            $params["message"] = doFeedbackAction($params, $action);
            $params["feedback"] = getAllFeedback();
            break;

        case 'api_calc':
            $params = doOperation();
            echo json_encode($params);
            die();

        case 'calculator':
            if (isset($_POST)) {
                $params["values"] = calculate();
            }
            break;
    }
    return $params;
}