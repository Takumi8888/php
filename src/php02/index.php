<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--http-equiv="x-ua-compatible" を追加すると、Internet Explorer（IE）に対して互換性のモードを指定できる（http-equiv=""：指示の種類、x-ua-compatible：IEに対する互換性のモード、content=""：指示の内容、IE=edge：最上位のモードを指定）-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Clock</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
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
        <div class="search-form__content"><!--class：main部の画面幅設定（block）-->

            <div class="search-form__heading"><!--class：h2見出しの配置設定（block）-->
                <h2>日本と世界の時間を比較</h2>
            </div>

            <form class="search-form" action="result.php" method="get"><!--class：検索ボックスのflex設定-->
                <div class="search-form__item"><!--class：検索ボックスの幅設定（block）-->
                    <select class="search-form__item-select" name="city"><!--class：検索ボックスの詳細設定（inline-block）-->
                        <option value="シドニー">シドニー</option>
                        <option value="上海">上海</option>
                        <option value="モスクワ">モスクワ</option>
                        <option value="ロンドン">ロンドン</option>
                        <option value="ヨハネスブルグ">ヨハネスブルグ</option>
                        <option value="ニューヨーク">ニューヨーク</option>
                    </select>
                </div>

                <div class="search-form__button"><!--class：検索ボタンの幅設定（block）-->
                    <button class="search-form__button-submit" type="submit"><!--class：検索ボタンの詳細設定（inline-block）-->
                        検索
                    </button>
                </div>

            </form>
        </div>
    </main>
</body>

</html>


<!-- 出力結果確認；http://localhost/php02/index.php -->