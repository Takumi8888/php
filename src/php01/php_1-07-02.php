<?php

$border_line = 210;

function number($score1, $score2, $score3){
    $add = $score1 + $score2 + $score3;
    return $add;
}

$total_score = number(81, 88, 95);

if($total_score > $border_line) {
    echo "合計点は{$total_score}なので合格です";
}else{
    echo "合計点は{$total_score}なので不合格です";
}

// 教材の回答
// <?php

// function exam($score1, $score2, $score3)
// {
//   $total = $score1 + $score2 + $score3;
//   if ($total > 210) {
//     echo $total . "点なので合格です";
//   } else {
//     echo $total . "点なので不合格です";
//   }
// }
// echo (exam(80, 60, 90));