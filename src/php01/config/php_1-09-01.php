<?php
$company = htmlspecialchars($_POST['company'], ENT_QUOTES);
// $company = htmlspecialchars($_GET['company'], ENT_QUOTES);
print "会社名は{$company}ですね";


// 1. POST
// リンク：http://localhost/php01/config/php_1-09-01.html
// POSTの使用用途
// ・サーバーに情報を投稿する
// ・配列などの長いデータを送信する
// ・ファイルのアップロードを行う

// 2. GET
// リンク：http://localhost/php01/config/php_1-09-01.php?company=株式会社estra&submit=送信する
// GETの使用用途
// ・サーバーから情報を取り出す