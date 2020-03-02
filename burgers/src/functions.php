<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 27.02.2020
 * Time: 18:16
 */

function connect()
{
    global $pdo;
    $pdo = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME ."", DB_USER, DB_PASSWORD);
}

function getUser($email)
{
    global $pdo;
    $getUser = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $getUser->execute(array($email));
    $user = $getUser->fetchAll();
    return $user;
}

function addUser($name, $phone, $email)
{
    global $pdo;
    $registration = $pdo->prepare('INSERT INTO users (name, phone, email) values (?, ?, ?)');
    $registration->execute([$name, $phone, $email]);
}

function addOrder($userId, $street, $home, $apartment, $part, $floor, $comment, $changeMoney, $payCard, $callback)
{
    global $pdo;
    $addOrder = $pdo->prepare('INSERT INTO orders (user_id, street, home, apartment, part, floor, comment, change_money, pay_card, callback) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $addOrder->execute([$userId, $street, $home, $apartment, $part, $floor, $comment, $changeMoney, $payCard, $callback]);
}

function getOrder($userId) {
    global $pdo;
    $getOrder = $pdo->prepare('SELECT * FROM orders WHERE user_id = ?');
    $getOrder->execute([$userId]);
    $order = $getOrder->fetchAll();
    return $order;
}

function sendMail($order, $home, $street, $part, $apartment, $floor)
{
    $orderNum = sizeof($order);
    $message = "
    Ваш заказ будет доставлен по адресу:
    Улица: $street
    Дом: $home
    Корпус: $part
    Квартира: $apartment
    Этаж: $floor
    
    Заказ:
    DarkBeefBurger за 500 рублей - 1 шт
    
    ";
    sizeof($order) == 1 ? $message .= "Спасибо - это ваш первый заказ" : $message .= "Спасибо! Это уже $orderNum заказ";

    $file = 'mail/order_'. $order[$orderNum-1]['id'] . "_" . date("d-m-Y") . '.txt';

    file_put_contents($file, $message);
}

function main()
{
    connect();
    //1. Проверка массива POST и выход если пусто.
    if (empty($_POST)) {
        return null;
    }

    //2. Преобразование данных.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $home = $_POST['home'];
    $part = $_POST['part'];
    $apartment = $_POST['appt'];
    $floor = $_POST['floor'];
    $comment = $_POST['comment'];
    $payCard = empty($_POST['pay-card']) ? 0 : 1;
    $changeMoney = empty($_POST['change-money']) ? 0 : 1;
    $callback = empty($_POST['callback']) ? 0 : 1;

    //3. Получение пользователя
    $user = getUser($email);
    if (empty($user)) {
        addUser($name, $phone, $email);
        $user = getUser($email);
    }

    //4. Оформление заказа
    $userId = $user['0']['id'];
    addOrder($userId, $street, $home, $apartment, $part, $floor, $comment, $changeMoney, $payCard, $callback);

    //5. Отправка письма
    $order = getOrder($userId);
    sendMail($order, $home, $street, $part, $apartment, $floor);


}

main();






