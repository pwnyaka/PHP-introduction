<?php
function doOperation() {
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $operand1 = (int)$data["operand1"];
    $operand2 = (int)$data["operand2"];

    switch ($data["operation"]) {
        case "+":
            $response["result"] = $operand1 + $operand2;
            break;
        case "-":
            $response["result"] = $operand1 - $operand2;
            break;
        case "*":
            $response["result"] = $operand1 * $operand2;
            break;
        case "/":
            if ($operand2 == 0) {
                $response["result"] = "На ноль делить нельзя!!!";
            } else {
                $response["result"] = $operand1 / $operand2;
            }
            break;
    }

    return json_encode($response);
}