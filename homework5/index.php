<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 04.03.2020
 * Time: 20:10
 */

include 'src/Rate.php';

$rate = new Rate\RateBase();
$rate->getPrice(50, 5, 54);
echo '<br>';
$ratePerHour = new \Rate\RateHours(1);
$ratePerHour->getPrice(10, 2.1, 23);
echo '<br>';
$ratePerDay = new \Rate\RateDay(0,1);
$ratePerDay->getPrice(120, 25, 44);
echo '<br>';
$rateStudent = new \Rate\RateStudent(1,0);
$rateStudent->getPrice(23, 3, 25);