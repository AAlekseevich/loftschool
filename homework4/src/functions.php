<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 24.02.2020
 * Time: 21:36
 */

function task1($file)
{
    $fileData = file_get_contents($file);

    $xml = new SimpleXMLElement($fileData);

    $orderDate = array_reverse(explode('-', $xml->attributes()->OrderDate));

    echo '<div class="purchase-order">';
    echo '<div class="information">';
    echo '<div class="address">';
    foreach ($xml->Address as $item) {
        echo '<div id="' . $item->attributes()->Type . '">';
        echo '<strong style="font-size: 20px;">' . $item->attributes()->Type . '</strong><br>';
        echo '<strong> Name: </strong>' . $item->Name . '<br>';
        echo '<strong> Street: </strong>' . $item->Street . '<br>';
        echo '<strong> City: </strong>' . $item->City . '<br>';
        echo '<strong> State: </strong>' . $item->State . '<br>';
        echo '<strong> Zip: </strong>' . $item->Zip . '<br>';
        echo '<strong> Country: </strong>' . $item->Country . '<br>';
        echo '</div>';
    }
    echo '</div>';
    echo '<div class="order-info">';
    echo '<strong style="font-size: 20px;">Order info</strong><br>';
    echo '<strong>Order number: </strong>' . $xml->attributes()->PurchaseOrderNumber . '<br>';
    echo '<strong>Order date: </strong>' . implode(' ',$orderDate) . '<br>';
    echo '</div>';
    echo '</div>';

    echo '<table border="1">';
    echo '<tr>';
    echo '<th >Product Name</th><th>Quantity</th><th>Price</th><th>Comment</th>';
    echo '</tr>';
    foreach ($xml->Items->Item as $item) {
        for ($i = 0; $i < sizeof($xml->Items); $i++) {
            echo '<tr>';
            echo '<td >' . $item->ProductName . '</td>';
            echo '<td >' . $item->Quantity . '</td>';
            echo '<td > $' . $item->USPrice . '</td>';
            echo '<td >' . $item->Comment . '</td>';
            echo '</tr>';
        }
    }
    echo '</table>';

    echo '<div class="delivery-notes">';
    echo '<strong style="font-size: 20px;">Delivery Notes</strong><br>';
    echo $xml->DeliveryNotes;
    echo '</div>';
    echo '</div>';

}
function task2()
{

}
function task3()
{

}
function task4()
{

}
