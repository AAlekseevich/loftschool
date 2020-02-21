<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 22.02.2020
 * Time: 1:52
 */

require_once "src/functions.php";

echo "<h2>Task 1</h2>";

$text = ["test", "qwerty", "123112", "qwe123"];


task1($text);

echo "<br>";

$res = task1($text, 1);
echo $res;

echo "<br>";
echo "<br>";

echo "<h2>Task 2</h2>";

echo task2("+", 3, 4, 5, 3, 5, 3, 1, 4);

echo "<br>";
echo "<br>";

echo "<h2>Task 3</h2>";

task3(8, 8);

echo "<br>";
echo "<br>";

echo "<h2>Task 4</h2>";

task4();

echo "<br>";
echo "<br>";

echo "<h2>Task 5</h2>";

task5("Четыре", "л");

echo "<br>";
echo "<br>";

echo "<h2>Task 6</h2>";

task6("test.txt");

$f = fopen("test.txt", "w");
fwrite($f, "Hello again!");
fclose($f);

