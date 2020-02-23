<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 22.02.2020
 * Time: 1:52
 */

function task1($arr, $ret = "0")
{
    if ($ret == 1) {
        $str = "";
        foreach ($arr as $item) {
            $str .= $item;
        }
        return $str;
    }
    foreach ($arr as $item) {
        echo "<p>" . $item . "</p>";
    }
}

function task2($opertions)
{
    $args = func_get_args();
    $res = 0;
    switch ($opertions) {
        case '+':
            for($i = 1; $i < sizeof($args); $i++) {
                $res += $args[$i];
            }
            return $res;
            break;
        case '-':
            for($i = 1; $i < sizeof($args); $i++) {
                $res -= $args[$i];
            }
            return $res;
            break;
        case '*':
            $res = $args[2];
            for($i = 2; $i < sizeof($args); $i++) {
                $res *= $args[$i];
            }
            return $res;
            break;
        case '/':
            $res = $args[2];
            for($i = 2; $i < sizeof($args); $i++) {
                $res /= $args[$i];
            }
            return $res;
            break;
        default:
            echo "Ошибка ввода математического оператора";

    }
}

function task3($row, $cell)
{
    if (!is_int($row) && !is_int($cell)) {
        echo "Аргументами могут быть только целые числа";
    }

    echo "<table border='2'>";
    for ($r = 1; $r <= $row; $r++) {
        echo '<tr>';
        for ($d = 1; $d <= $cell; $d++) {
            $res = $r * $d;
            echo "<td style='padding: 10px'> " . $res . " </td>";
        }
    }
    echo "</table>";
}

function task4()
{
    echo date("d.m.y g:i" );
    echo '<br>';
    echo mktime("0", "0", "0", "02", "24", "2016");
}

function task5($bottle, $remove)
{
    echo str_replace($remove, "",'Карл у Клары украл Кораллы');
    echo "<br>";
    echo str_replace("Две", $bottle, "Две бутылки лимонада");
}

function task6($file)
{
    $f = fopen($file, "r");
    $str = fgets($f);
    echo "Текст файла: " . $str;
    fclose($f);
}