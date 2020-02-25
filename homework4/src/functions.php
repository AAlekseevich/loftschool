<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 24.02.2020
 * Time: 21:36
 */

function indentation() {
    echo '<br><br>';
}

function titleTask($titleTask) {
    echo '<h1>' . $titleTask . '</h1>';
}

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

function arrayRecursiveDiff($Array1, $Array2) {
    $Result = array();

    foreach ($Array1 as $key => $value) {
        if (array_key_exists($key, $Array2)) {
            if (is_array($value)) {
                $aRecursiveDiff = arrayRecursiveDiff($value, $Array2[$key]);
                if (count($aRecursiveDiff)) { $Result[$key] = $aRecursiveDiff; }
            } else {
                if ($value != $Array2[$key]) {
                    $Result[$key] = $value;
                }
            }
        } else {
            $Result[$key] = $value;
        }
    }

    return $Result;
}

function task2($arr)
{
    $encodeArray = json_encode($arr);
    $output1 = 'output.json';
    $output2 = 'output2.json';
    file_put_contents($output1, $encodeArray);

    $jsonArray = file_get_contents($output1);
    if (rand(0, 1) == 1) {
        $jsonArray = json_decode($jsonArray, true);
        echo '<pre><h2>Изначальный массив:</h2>';
        print_r($jsonArray);
        foreach ($jsonArray as &$item) {
            $k = rand(0, sizeof($item));
            for ($i = 0; $i < sizeof($item); $i++) {
                if ($k == $i) {
                    unset($item[$i]);
                }
            }
        }
        echo '<h2>Измененный массив:</h2>';
        print_r($jsonArray);
        $jsonArray = json_encode($jsonArray);
        file_put_contents($output2, $jsonArray);

        $jsonArray1 = file_get_contents($output1);
        $jsonArray2 = file_get_contents($output2);
        $jsonArray1 = json_decode($jsonArray1, true);
        $jsonArray2 = json_decode($jsonArray2, true);

        $result = arrayRecursiveDiff($jsonArray1, $jsonArray2);
        echo '<h2>Во втором массиве отсутствуют:</h2>';
        print_r($result);
        echo '</pre>';
    } else {
        echo "Без изменений";
    }
    file_put_contents($output2, $jsonArray);


}
function task3()
{
    $arr = [];
    for ($i = 0; $i != 50; $i++) {
        $arr[$i] = rand(0, 100);
    }

    $output = 'output.csv';

    $fp = fopen($output, 'w');
    fputcsv($fp, $arr);
    fclose($fp);

    $fp = fopen($output, 'r');
    $data = fgetcsv($fp, 1000);
    $count = count($data);
    $result = 0;
    for ($i = 0; $i != $count; $i++) {
        if ($data[$i] % 2 == 0) {
            $result += $data[$i];
        }
    }
    fclose($fp);
    echo "Результат: " . $result;
}
function task4()
{

}
