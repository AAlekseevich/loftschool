<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 02.03.2020
 * Time: 23:20
 */

function connect()
{
    global $pdo;
    $pdo = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME ."", DB_USER, DB_PASSWORD);
}

function getUsers() {
    global $pdo;
    $queryUsers = $pdo->query('SELECT * FROM users');
    $users = $queryUsers->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getOrders() {
    global $pdo;
    $queryOrders = $pdo->query('SELECT * FROM orders');
    $orders = $queryOrders->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}

function main() {
    connect();

    $users = getUsers();
    echo '<table border="1">';
    echo '<th>ID</th><th>Name</th><th>Phone</th><th>Email</th>';
    foreach ($users as $user) {
        echo '<tr>';
        foreach ($user as $key => $value) {
            if ($key != 'date') {
                echo '<td style="padding: 10px 10px">' . $value . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';

    echo '<br><br>';

    $orders = getOrders();
    echo '<table border="1">';
    echo '<th>ID</th><th>User ID</th><th>Street</th><th>Home</th><th>Apartment</th><th>Part</th><th>Floor</th><th>Comment</th><th>Change pay</th><th>Pay card</th><th>Callback</th>';
    foreach ($orders as $order) {
        echo '<tr>';
        foreach ($order as $key => $value) {
            if ($key != 'date') {
                echo '<td style="padding: 10px 10px">' . $value . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}

main();