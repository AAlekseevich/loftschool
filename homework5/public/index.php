<?php
/**
 * Created by PhpStorm.
 * modelUser: Anton
 * Date: 04.03.2020
 * Time: 20:10
 */

include '../src/Rate.php';

$rate = new \Rate\RateBase(0, 1, 33);
$rate->setHours(33);
$rate->setDistance(33);
$rate->getPrice();
echo '<br>';
$ratePerHour = new \Rate\RateHours(0, 1, 40);
$ratePerHour->getPrice();
echo '<br>';
$ratePerDay = new \Rate\RateDay(0,1, 19);
$ratePerDay->getPrice();
echo '<br>';
$rateStudent = new \Rate\RateStudent(1,0, 22);
$rateStudent->getPrice();