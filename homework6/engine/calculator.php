<?php
function calculate() {
    if (isset($_POST)) {
        $params = [];

        $params["value1"] = $_POST["value1"];
        $params["value2"] = $_POST["value2"];
        $params["operation"] = $_POST["operation"];

        switch ($params["operation"]) {
            case "+":
                $params["result"] = $params["value1"] + $params["value2"];
                break;
            case "-":
                $params["result"] = $params["value1"] - $params["value2"];
                break;
            case "*":
                $params["result"] = $params["value1"] * $params["value2"];
                break;
            case "/":
                if ($params["value2"] == 0) {
                    $params["result"] = "На ноль делить нельзя!!!";
                } else {
                    $params["result"] = $params["value1"] / $params["value2"];
                }
                break;
        }
    }
    return $params;
}
