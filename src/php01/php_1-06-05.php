<?php

$count = 0;
$Fizz = 3;
$Buzz = 5;

while($count < 50){
    ++$count;
    if($count % $Fizz === 0 && $count % $Buzz  === 0) {
        echo 'FizzBuzz <br />';
    }elseif($count % $Fizz === 0){
        echo 'Fizz <br />';
    }elseif($count % $Buzz  === 0){
        echo 'Buzz <br />';
    }else{
        echo $count . '<br />';
    }
}

// 教材の回答
// <?php
// $Fizz = "Fizz";
// $Buzz = "Buzz";
// $FizzBuzz = "FizzBuzz";

// for ($i = 1; $i <= 50; $i++) {
//   if ($i % 15 == 0) {
//     echo $FizzBuzz;
//   } else if ($i % 3 == 0) {
//     echo $Fizz;
//   } else if ($i % 5 == 0) {
//     echo $Buzz;
//   } else {
//     echo $i;
//   }
// }