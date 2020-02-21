<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 22.02.2020
 * Time: 0:56
 */

$day = 65;

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день";
        break;
    case 6:
    case 7:
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
}