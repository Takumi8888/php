<?php

//Step1：「search_city_time.php」ファイルの読み込み
require_once('functions/search_city_time.php'); //「result.php」ファイルに「search_city_time.php」ファイルを読み込む（require関数は外部ファイルの読み込みを実行する。require：複数回読み込み(定義を呼び出し)可能、require_once：一度読み込んだファイルは読み込まない）

//Step2：東京の「'name','time_zone','img'」データを取得する
$tokyo = searchCityTime('東京'); //「searchCityTime」関数に「東京」と指定することで、「search_city_time.php」ファイルにて処理が実行される。「search_city_time.php」ファイルでは「cities.php」ファイルを読み込み、東京に該当する「'name','time_zone','img'」データをそれぞれ取得する。

//Step3：「index.php」ファイルで選択した国名データを「$city」に代入する
$city = htmlspecialchars($_GET['city'], ENT_QUOTES); //「index.php」ファイルの検索ボックスで選択した国名データを「$city」に代入する。このとき、「index.php」ファイルの「method」タグが「GET」であるため、「result.php」ファイルで取得する際も「$_GET」を使用する。
//「htmlspecialchars」はフォームを利用したセキリュティの攻撃を防ぐためにエスケープ処理をするための関数であり、「htmlspecialchars」( 変換対象, 変換パターン, 文字コード ) という記法で実行する。「ENT_QUOTES」はPHPが定数としてもっているint型の値であり、「ENT_QUOTES」を指定すると、特殊文字のうちシングルクォーテーションとダブルクォーテーションも変換対象に含めるようになる。

//Step4：該当国の「'name','time_zone','img'」データを取得する
$comparison = searchCityTime($city); //「searchCityTime」関数に「$city」で取得した国名データを代入し、「search_city_time.php」ファイルにて処理が実行される。「search_city_time.php」ファイルでは「cities.php」ファイルを読み込み、一致する国名から、「'name','time_zone','img'」データをそれぞれ取得する。

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Clock</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>

<body>
    <header class="header"><!--class：背景色設定（block）-->
        <div class="header__inner"><!--class：header部の画面幅設定（block）-->
            <a class="header__logo" href="/php02/index.php"><!--class：logo（World Clock）のフォント仕様設定（inline）-->
                World Clock
            </a>
        </div>
    </header>

    <main>
        <div class="result__content"><!--class：main部の画面幅設定（block）-->
            <div class="result-cards"><!--class：結果画面_全体_flex設定-->

                <div class="result-card"><!--class：結果画面_単体（block）-->
                    <div class="result-card__img-wrapper"><!--class：結果画面_単体_画像_wrapper（block）-->
                        <img class="result-card__img" src="img/<?php echo $tokyo['img'] ?>" alt="国旗" /><!--class：結果画面_単体_画像（block）--><!--$tokyo['img']：cities.phpファイルの連想配列より、$tokyoに指定されたimg画像を取得-->
                    </div>
                    <div class="result-card__body"><!--class：結果画面_全体_文字情報（block）-->
                        <p class="result-card__city"><!--class：結果画面_単体_文字情報（block）-->
                            <?php echo $tokyo['name'] ?><!--$tokyo['name']：cities.phpファイルの連想配列より、$tokyoに指定されたnameを取得-->
                        </p>
                        <p class="result-card__time"><!--class：結果画面_単体_文字情報（block）-->
                            <?php echo $tokyo['time'] ?><!--$tokyo['time']：cities.phpファイルの連想配列より、$tokyoに指定されたtimeを取得-->
                        </p>
                    </div>
                </div>

                <div class="result-card"><!--class：結果画面_単体（block）-->
                    <div class="result-card__img-wrapper"><!--class：結果画面_単体_画像_wrapper（block）-->
                        <img class="result-card__img" src="img/<?php echo $comparison['img'] ?>" alt="国旗" /><!--class：結果画面_単体_画像（block）--><!--$comparison['img']：cities.phpファイルの連想配列より、各cityに指定されたimg画像を取得-->
                    </div>
                    <div class="result-card__body"><!--class：結果画面_全体_文字情報（block）-->
                        <p class="result-card__city"><!--class：結果画面_単体_文字情報（block）-->
                            <?php echo $comparison['name'] ?><!--$comparison['img']：cities.phpファイルの連想配列より、各cityに指定されたnameを取得-->
                        </p>
                        <p class="result-card__time"><!--class：結果画面_単体_文字情報（block）-->
                            <?php echo $comparison['time'] ?><!--$comparison['img']：cities.phpファイルの連想配列より、各cityに指定されたtimeを取得-->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>

</html>