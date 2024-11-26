<?php

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$radio = htmlspecialchars($_POST['radio'], ENT_QUOTES);
$number = htmlspecialchars($_POST['number'], ENT_QUOTES);

print "私の名前は、{$name}<br />";
print "ご注文の商品は、{$radio}<br />";
print "注文数は、{$number}";

// リンク：http://localhost/php01/config/php_1-09-02.html

// 教材の回答
// <?php
// $my_name = htmlspecialchars($_POST['my_name'], ENT_QUOTES);
// $choices = htmlspecialchars($_POST['choices'], ENT_QUOTES);
// $number = htmlspecialchars($_POST['number'], ENT_QUOTES);

// print "私の名前は、" . $my_name . "<br>";
// print "ご希望の商品は、" . $choices . "<br>";
// print "注文数は、" . $number;