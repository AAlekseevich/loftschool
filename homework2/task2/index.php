<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 22.02.2020
 * Time: 0:21
 */

require_once "inc.php";

echo "На школьной выставке " . DRAWINGS . " рисунков." . "<br>";
echo FELT_TIP_PENS . " из них выполнены фломастерами, " . PENCILS . " карандашами, а остальные — красками" . "<br>";
$paints = DRAWINGS - FELT_TIP_PENS - PENCILS;
echo "Общее кол-во рисунков " . DRAWINGS . " - " . FELT_TIP_PENS . " фломастерами - " . PENCILS . " карандашами = " . $paints . " красками <br>";
echo $paints . " рисунков, выполнены красками на школьной выставке";