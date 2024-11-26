<?php

$top = 5;
$bottom = 15;
$height = 8;

function area($top, $bottom, $height){
    $triangle = $bottom * $height / 2;              //三角形：底辺 × 高さ ÷ 2
    $square = $bottom * $height;                    //四角形：底辺 × 高さ
    $trapezoid = ($top + $bottom) * $height / 2;    //台形  ：（上底＋下底）× 高さ ÷ 2

    echo "三角形の面積は{$triangle}㎠です<br />";
    echo "四角形の面積は{$square}㎠です<br />";
    echo "台形の面積は{$trapezoid}㎠です";

    return [$triangle, $square, $trapezoid];
}

area(5, 15, 8);

// 教材の回答
// <?php

// function getSquareArea($base, $height)
// {
//   return $base * $height;
// }
// function getTriangleArea($base, $height)
// {
//   return $base * $height / 2;
// }
// function getTrapezoidArea($upperBase, $lowerBase, $height)
// {
//   return ($upperBase + $lowerBase) * $height / 2;
// }

// echo getSquareArea(5, 5) . "\n";
// echo getTriangleArea(7, 8) . "\n";
// echo getTrapezoidArea(4, 5, 4);