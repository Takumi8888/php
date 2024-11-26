<?php

$a = 7;
$judgement1 = 5;
$judgement2 = 7;

if ($a == $judgement1) {
    echo "\$aは{$judgement1}です";
} elseif ($a == $judgement2) {
    echo "\$aは{$judgement2}です";
} else {
    echo "\$aは{$judgement1 }、{$judgement2}以外です";
}
