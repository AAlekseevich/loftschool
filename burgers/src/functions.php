<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 27.02.2020
 * Time: 18:16
 */

require_once '../vendor/autoload.php';

use Intervention\Image\ImageManager as Image;

$count = 0;

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

function sendMail($order, $email, $home, $street, $part, $apartment, $floor)
{
    $transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
        ->setUsername('loftschoolburger@yandex.ru')
        ->setPassword('loftschoolburger123')
    ;

    $mailer = new Swift_Mailer($transport);
    $orderNum = sizeof($order);
    $userOrderNum = sizeof($order) == 1 ? "Спасибо - это ваш первый заказ" : "Спасибо! Это уже $orderNum заказ";
    $message = (new Swift_Message('Ваш заказ №' . $orderNum . ' LoftSchool Burgers'))
        ->setFrom(['loftschoolburger@yandex.ru' => 'LoftSchool Burgers'])
        ->setTo([$email])
        ->setBody(

            '<html>' .
            '<body>' .
            'Ваш заказ будет доставлен по адресу: <br> ' .
            'Улица: ' . $street . '<br>' .
            'Дом: ' . $home . '<br>' .
            'Корпус: ' . $part . '<br>' .
            'Квартира: ' . $apartment . '<br>' .
            'Этаж: ' . $floor . '<br>' .
            'Заказ: <br>' .
            'DarkBeefBurger за 500 рублей - 1 шт <br><br>' .
            $userOrderNum .
            '</body>' .
            '</html>',
            'text/html'
        )
    ;

    $result = $mailer->send($message);
}

function editImage()
{
    $manager = new Image(array('driver' => 'gd'));
    $img = $manager->make('../public/img/content/burgers/1.png');
    $img->resize(200, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->colorize(-15, -15, -15);
    $img->rotate(-45);
    $watermark = $manager->make('../public/img/content/watermark.png');
    $watermark->colorize(100, 100, 100);
    $watermark->resize(100, null, function ($constraint) {
    $constraint->aspectRatio();
    });
    $img->insert($watermark, 'center');
    $img->save('../public/img/content/burger.png');
}

function main(&$count)
{
    editImage();


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
    sendMail($order, $email, $home, $street, $part, $apartment, $floor);

}

main($count);






