<?php

$count = 0;
$judgement = 0;
$max_count = 100;
$break_point = 20;

while($count < $max_count) {
    $count++;
    $judgement++;
    $judgement %= 3;

    if($judgement == 0){
        continue;
    }elseif($count >= $break_point){
        break;
    }

    echo $count . '<br />';
}

// 教材の回答
// <?php
// $count = 0;

// while ($count <= 100) {
//   if ($count === 20) {
//     break;
//   }
//   if ($count % 3 === 0) {
//     $count++;
//     continue;
//   }
//   echo $count . '<br />';
//   $count++;
// }