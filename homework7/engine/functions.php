<?php
//Файл с функциями нашего движка


//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{
        return renderTemplate(LAYOUTS_DIR . 'main',
            [
                'menu' => renderTemplate('menu', $params),
                'content' => renderTemplate($page, $params)
            ]
        );

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
            $params['user'] = 'Уважаемый гость';
            break;

        case 'auth':
            if ($action == "login") {

                if (isset($_POST['send'])) {
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    if (!auth($login, $pass)) {
                        Die('Не верный логин пароль');
                    } else {
                        if (isset($_POST['save'])) {
                            updateHash();
                        }
                        header("Location:" . $_SERVER['HTTP_REFERER']);
                    }
                }
            }

            if ($action == "logout") {
                session_destroy();
                setcookie("hash", "", time() - 36000, '/');
                header("Location: /");

            }
            break;

        case 'admin':
            if (!is_admin()) Die('Нет прав!');
            $params['orders'] = getOrders();
            for ($i = 0; $i < count($params['orders']); $i++) {
                switch ($params['orders'][$i]['status']) {
                    case 0:
                        $params['orders'][$i]['statusText'] = 'Новый';
                        break;
                    case 1:
                        $params['orders'][$i]['statusText'] = 'В работе';
                        break;
                    case 2:
                        $params['orders'][$i]['statusText'] = 'Оплачен';
                        break;
                    case 3:
                        $params['orders'][$i]['statusText'] = 'Выполнен';
                        break;
                }
            }
            break;

        case 'detail':
            if (!is_admin()) Die('Нет прав!');
            $params['basket'] = getOrderDetail($_GET['id']);
            $params['sum'] = getOrderSum($_GET['id']);
            break;

        case 'api':
            if ($action == 'buy') {
                $postData = file_get_contents('php://input');
                $data = json_decode($postData, true);
                addProduct($data["id"]);
                echo json_encode(["count" => getBasketCount()]);
                die();
            } elseif ($action == 'delete') {
                $postData = file_get_contents('php://input');
                $data = json_decode($postData, true);
                deleteProduct($data["id"]);
                echo json_encode(["count" => getBasketCount(), "basketSum" => getBasketSum(), "productSum" => getProductSum($data["id"]),
                    "id" => $data["id"]]);
                die();
            } elseif ($action == 'accept') {
                if (!is_admin()) Die('Нет прав!');
                $postData = file_get_contents('php://input');
                $data = json_decode($postData, true);
                acceptOrder($data["id"]);
                echo json_encode(["result" => 1]);
                die();
            }
            break;

        case 'my-orders':
            $params['userOrders'] = getUserOrders();
            $params['userOrdersDetails'] = getUserOrdersDetails();
            for ($i = 0; $i < count($params['userOrders']); $i++) {
                switch ($params['userOrders'][$i]['status']) {
                    case 0:
                        $params['userOrders'][$i]['statusText'] = 'Ожидает обработки';
                        break;
                    case 1:
                        $params['userOrders'][$i]['statusText'] = 'Принят';
                        break;
                    case 2:
                        $params['userOrders'][$i]['statusText'] = 'Оплачен';
                        break;
                    case 3:
                        $params['userOrders'][$i]['statusText'] = 'Завершен';
                        break;
                }
            }
            break;

        case 'users':
            $params["users"] = getUsers();
            break;

        case 'product':
            $id = (int)$_GET["id"];
            $params['product'] = getProduct($id);
            break;

        case 'catalog':
            switch ($_GET["message"]) {
                case 'OK':
                    $params["message"] = "Благодарим за оформление заказа!";
                    break;

                case 'error':
                    $params["message"] = "При оформлении заказа произошла ошибка!";
                    break;
            }
            if ($_POST["send"]) {
                $params["error"] = loadImage();
            }
            $params["images"] = getDbContent();
            break;

        case 'basket':
            $params["basketSum"] = getBasketSum();
            $params["basket"] = getBasket();
            if ($action == 'addorder') {
                makeOrder();
            }
            break;

        case 'feedback':
            $params["action"] = 'add';
            $params["buttonText"] = 'Отправить отзыв';
            $params["message"] = doFeedbackAction($params, $action);
            $params["feedback"] = getAllFeedback();
            break;

        case 'api_calc':
            $params["result"] = doOperation();
            echo json_encode($params["result"]);
            die();

        case 'calculator':
            if (isset($_POST)) {
                $params["values"] = calculate();
            }
            break;
    }
    return $params;
}