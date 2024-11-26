<?php

$circle = "●";
$x = 5;
$y = 5;
$count_x = 0;
$count_y = 0;

while($count_y < $y){
    while ($count_x < $x) {
        echo $circle;
        $count_x++;
    }
    echo '<br />';
    $count_x = 0;
    $count_y++;
}

// 教材の回答
// for ($i = 1; $i < 6; $i++) {
//     for ($j = 1; $j < 6; $j++) {
//         echo "●";
//     }
//     echo "<br />";
// }