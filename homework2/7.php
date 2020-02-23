<?php
switch (date("H")) {
    case "01":
    case "21":
        $hour = "час";
        break;
    case "02":
    case "03":
    case "04":
    case "22":
    case "23":
        $hour = "часа";
        break;
    default:
        $hour = "часов";
        break;
}
switch (date("i")) {
    case "01":
    case "21":
    case "31":
    case "41":
    case "51":
        $minute = "минута";
        break;
    case "02":
    case "03":
    case "04":
    case "22":
    case "23":
    case "24":
    case "32":
    case "33":
    case "34":
    case "42":
    case "43":
    case "44":
    case "52":
    case "53":
    case "54":
        $minute = "минуты";
        break;
    default:
        $minute = "минут";
        break;
}
echo date("Текущее время: H {$hour} i {$minute} (МСК)");
