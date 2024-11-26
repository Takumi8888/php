<?php

//Step1：「status_codes.php」ファイルの読み込み
require_once('config/status_codes.php'); //「result.php」ファイルに「status_codes.php」ファイルを読み込む（require関数は外部ファイルの読み込みを実行する。require：複数回読み込み(定義を呼び出し)可能、require_once：一度読み込んだファイルは読み込まない）

//Step2：正解を指定する
$answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES); //「index.php」ファイルの「answer_code」で指定された値を「result.php」ファイルの「$answer_code」に代入する。このとき、「index.php」ファイルの「method」タグが「POST」であるため、「result.php」ファイルで取得する際も「$_POST」を使用する。
//「htmlspecialchars」はフォームを利用したセキリュティの攻撃を防ぐためにエスケープ処理をするための関数であり、「htmlspecialchars」( 変換対象, 変換パターン, 文字コード ) という記法で実行する。「ENT_QUOTES」はPHPが定数としてもっているint型の値であり、「ENT_QUOTES」を指定すると、特殊文字のうちシングルクォーテーションとダブルクォーテーションも変換対象に含めるようになる。

//Step3：ユーザーの回答を指定する
$option = htmlspecialchars($_POST['option'], ENT_QUOTES); //「index.php」ファイルの「option」で指定された値を「result.php」ファイルの「$option」に代入する。このとき、「index.php」ファイルの「method」タグが「POST」であるため、「result.php」ファイルで取得する際も「$_POST」を使用する。
//「htmlspecialchars」はフォームを利用したセキリュティの攻撃を防ぐためにエスケープ処理をするための関数であり、「htmlspecialchars」( 変換対象, 変換パターン, 文字コード ) という記法で実行する。「ENT_QUOTES」はPHPが定数としてもっているint型の値であり、「ENT_QUOTES」を指定すると、特殊文字のうちシングルクォーテーションとダブルクォーテーションも変換対象に含めるようになる。

//Step4：ユーザーの回答が未回答時の処理
if (!$option) { //$optionに対して「!」となっているので、$optionに値がない場合に条件を満たす
    header('Location: index.php'); //header関数：HTTPヘッダを送信する、Location：指定のURL先に遷移する
}

//Step5：解説tableに表示する「$code」と「$description」の準備
foreach ($status_codes as $status_code) { //「freach」により、「status_codes.php」ファイル内の要素分、繰り返し処理される
    if ($status_code['code'] === $answer_code) { //正解と一致した配列に該当した場合のみ実行される
        $code = $status_code['code']; //「$code」に対し、正解と一致した配列の「code」を代入する
        $description = $status_code['description']; //「$description」に対し、正解と一致した配列の「description」を代入する
    }
}

//Step6：照合する
$result = $option === $code; //「$option（ユーザーの回答）」と「$code（正解）」が一致したら「True」、不一致ならば「False」の値が「$result」に代入する

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--http-equiv="x-ua-compatible" を追加すると、Internet Explorer（IE）に対して互換性のモードを指定できる（http-equiv=""：指示の種類、x-ua-compatible：IEに対する互換性のモード、content=""：指示の内容、IE=edge：最上位のモードを指定）-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Code Quiz</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>

<body>
    <header class="header"><!--class：背景色設定（block）-->
        <div class="header__inner"><!--class：header部の画面幅設定（block）-->
            <a class="header__logo" href="/"><!--class：logo（Status Code Quiz）のフォント仕様設定（inline）-->
                Status Code Quiz
            </a>
        </div>
    </header>

    <main>
        <div class="result__content"><!--class：main部の画面幅設定（block）-->
            <div class="result"><!--class：合否判定（block）-->
                <?php if ($result): ?><!--「$result」の値が「True」の場合-->
                    <h2 class="result__text--correct">正解</h2><!--class：文字・画像の水平方向を指定する（center：中央配置）--><!--class：正解時のtext設定（block）-->
                <?php else: ?><!--「$result」の値が「False」の場合-->
                    <h2 class="result__text--incorrect">不正解</h2><!--class：文字・画像の水平方向を指定する（center：中央配置）--><!--class：不正解時のtext設定（block）-->
                <?php endif; ?><!--php：if文の処理終了-->
            </div>
            <div class="answer-table"><!--class：解説tableの外枠（block）-->
                <table class="answer-table__inner"><!--class：解説tableの外枠（table-->
                    <tr class="answer-table__row"><!--class：-->
                        <th class="answer-table__header">ステータスコード</th><!--class：解説tableの表頭に対する設定（table-cell）-->
                        <td class="answer-table__text"><!--class：解説tableの回答内容に対する設定（table-cell）-->
                            <?php echo $code ?><!--php：正解の「code」を上記Step5で指定した「$code」より表示する-->

                        </td>
                    </tr>
                    <tr class="answer-table__row">
                        <th class="answer-table__header">説明</th><!--class：解説tableの表頭に対する設定（table-cell）--><!--class：解説table最終行の表頭、回答内容に対する設定（table-cell）-->
                        <td class="answer-table__text"><!--class：解説tableの回答内容に対する設定（table-cell）--><!--class：解説table最終行の表頭、回答内容に対する設定（table-cell）-->
                            <?php echo $description ?><!--php：正解の「description」を上記Step5で指定した「$description」より表示する-->
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>