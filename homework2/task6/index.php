<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 22.02.2020
 * Time: 1:31
 */

echo "<table border='2'>";

for ($r = 1; $r <= 10; $r++) {
    echo '<tr>';
    for ($d = 1; $d <= 10; $d++) {
        $res = $r * $d;
        if ($d % 2 == 0 && $r % 2 == 0)
            echo "<td style='padding: 10px'> (" . $res . ") </td>";
        elseif ($d % 2 != 0 && $r % 2 != 0 && $d != 1 && $r != 1)
            echo "<td style='padding: 10px'> [" . $res . "] </td>";
        else
            echo "<td style='padding: 10px'> " . $res . " </td>";
    }
}

echo "</table>";