<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 24.02.2020
 * Time: 21:36
 */

echo '<link href="assets/css/main.css" rel="stylesheet">';

require_once 'src/functions.php';

titleTask('Task 1');

task1('data.xml');

indentation();

titleTask('Task 2');

$arr = [
    'Apartment House1' => ['Apart1', 'Apart2', 'Apart3', 'Apart4'],
    'Apartment House2' => ['Apart1', 'Apart2', 'Apart3', 'Apart4'],
    'Apartment House3' => ['Apart1', 'Apart2', 'Apart3', 'Apart4'],
];

task2($arr);

indentation();

titleTask('Task 3');

task3();

indentation();

titleTask('Task 4');

task4();

indentation();