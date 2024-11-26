<?php

$people = [
    [
        'name' => '花垣武道',
        'age' => 26,
        'gender' => 'men'
    ],
    [
        'name' => '佐野万次郎',
        'age' => 15,
        'gender' => 'men'
    ],
    [
        'name' => '橘ヒナタ',
        'age' => 14,
        'gender' => 'women'
    ]
];

foreach($people as $parson => $parameter){
    foreach ($parameter as $parameter_detail => $value){
        if($parameter_detail == 'name'){
            echo "{$value}(";
        }elseif($parameter_detail == 'age') {
            echo "{$value}歳";
        }elseif($parameter_detail == 'gender') {
            echo "{$value})<br />";
        }
    }
}

// 教材の回答
// <?php

// $people = [
//   ['Taro', 25, 'men'],
//   ['Jiro', 20, 'men'],
//   ['hanako', 16, 'women']
// ];

// foreach ($people as $person) {
//   echo $person[0] . '(' . $person[1] . '歳' . $person[2] . ')'. '<br />';
// }