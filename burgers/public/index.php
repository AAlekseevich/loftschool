<?php

include __DIR__ . '/../src/config.php';
include __DIR__ . '/../src/functions.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../src/template/');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../src/template/index_cache/',
]);

echo $twig->render('index.twig');