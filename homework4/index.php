<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 24.02.2020
 * Time: 21:36
 */

echo '<link href="assets/css/main.css" rel="stylesheet">';

echo '<h1>Task 1</h1>';

require_once 'src/functions.php';
task1('data.xml');

indentation();

echo '<h1>Task 2</h1>';

$arr = [
    'Apartment House1' => ['Apart1', 'Apart2', 'Apart3', 'Apart4'],
    'Apartment House2' => ['Apart1', 'Apart2', 'Apart3', 'Apart4'],
    'Apartment House3' => ['Apart1', 'Apart2', 'Apart3', 'Apart4'],
];

task2($arr);

indentation();