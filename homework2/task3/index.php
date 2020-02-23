<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 22.02.2020
 * Time: 0:49
 */

const MIN_LOWER_AGE = 1;
const MAX_LOWER_AGE = 17;
const MIN_UPPER_AGE = 18;
const MAX_UPPER_AGE = 65;

$age = 23;

if ($age >= MIN_UPPER_AGE && $age <= MAX_UPPER_AGE) {
    echo "Вам еще работать и работать";
} elseif ($age > MAX_UPPER_AGE) {
    echo "Вам пора на пенсию";
} elseif ($age >= MIN_LOWER_AGE && MAX_LOWER_AGE <= 17) {
    echo "Вам ещё рано работать";
} else {
    echo "Неизвестный возраст";
}