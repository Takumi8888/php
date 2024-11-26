<?php

//Step1：「status_codes.php」ファイルの読み込み
require_once('config/status_codes.php'); //「index.php」ファイルに「status_codes.php」ファイルを読み込む（require関数は外部ファイルの読み込みを実行する。require：複数回読み込み(定義を呼び出し)可能、require_once：一度読み込んだファイルは読み込まない）

//Step2：「status_codes.php」ファイルより、ランダムに4つの要素を取得する
$random_indexes = array_rand($status_codes, 4); //「array_rand」関数により、「status_codes.php」ファイルの「$status_codes」配列から、ランダムに4つの要素（0～11のいずれか）を取得する

//Step3：「$random_indexes」より、選択肢用の配列として再構築する
foreach ($random_indexes as $index) { //「freach」により、「$random_indexes」内の要素の分（4回）だけ繰り返し処理される
    $options[] = $status_codes[$index]; //選択肢用の配列として「$options[]」を作成する。その際に「$random_indexes」で取得した4つの要素（0～11のいずれか）を「$status_codes[]」に代入する
}

//Step4：再構築した配列「$options」より、正解する要素を確定する
$question = $options[mt_rand(0, 3)]; //mt_rand(min, max)：最小値と最大値を指定し、指定範囲内の値をランダムで取得する。「$options」内の0～3のどの要素を正解とするかを確定する

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
    <link rel="stylesheet" href="css/index.css">
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
        <div class="quiz__content"><!--class：main部の画面幅設定（block）-->
            <div class="question"><!--class：出題の詳細設定（block）-->
                <p class="question__text">該当するステータスコードを選んでください</p><!--class：出題のtext設定（block）-->
                <p class="question__text"><!--class：出題のtext設定（block）-->
                    問題：<?php echo $question['description'] ?><!--php：「status_codes.php」ファイルの「$status_codes」配列より$question（上記Step4参照）で指定された「'description'」情報を表示する。-->
                </p>
            </div>

            <form class="quiz-form" action="result.php" method="POST"><!--class：選択肢の詳細設定（block）--><!--action：データの送信先として「result.php」を指定する--><!--method：フォームの送信方法（post：フォームのデータをHTTPリクエストの本文として送信する（一度に大量のデータを送信できる）、get：フォームのデータをURLの末尾に追加して送信する（送信できるデータ量には制限がある））-->

                <!--正解を指定する-->
                <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>"><!--class：選択肢のmargin設定（block）--><!--php：「status_codes.php」ファイルの「$status_codes」配列より$question（上記Step4参照）で指定された「'code'」情報を「value属性」に指定し、「name="answer_code"」に代入する-->

                <div class="quiz-form__item"><!--class：選択肢のmargin設定（block）-->

                    <!--回答項目を指定する-->
                    <?php foreach ($options as $option) : ?><!--php：「freach」により、「$options」（上記Step3参照）内の要素の分（4回）だけ繰り返し処理される。ユーザーが回答を押下する際、「$option['code']」の値が確定され、その情報が「result.php」ファイルに送られる-->

                        <div class="quiz-form__group"><!--class：各選択肢１～４の見栄え設定（block）-->
                            <input class="quiz-form__radio" id="<?php echo $option['code'] ?>" type="radio" name="option" value="<?php echo $option['code'] ?>"><!--class：各選択肢１～４のinput要素の設定（none：HTML上にない）--><!--php：「status_codes.php」ファイルの「$status_codes」配列より「$option」（上記Step3参照）で指定された「'code'」情報を「id属性」と「value属性」に指定する-->

                            <label class="quiz-form__label" for="<?php echo $option['code'] ?>"><!--class：各選択肢１～４の詳細設定（block）--><!--class：各選択肢１～４クリック時の要素変更_:checked+label（none）--><!--php：「status_codes.php」ファイルの「$status_codes」配列より「$option」（上記Step3参照）で指定された「'code'」情報を「for属性」に指定する。この時、「inputのid属性」と「labelのfor属性」を関連付けることで、ユーザーがラベルをクリックした際に対応するフォーム要素にフォーカスが移動する-->
                                <?php echo $option['code'] ?><!--php：「status_codes.php」ファイルの「$status_codes」配列より$option上記Step3参照）で指定された「'code'」情報をラベル上に表示させる-->
                            </label>

                        </div>
                    <?php endforeach; ?><!--php：「freach」の繰り返し処理終了-->
                </div>

                <div class="quiz-form__button"><!--class：回答ボタンのsize設定（block）-->
                    <button class="quiz-form__button-submit" type="submit"><!--class：回答ボタンの詳細設定（inline-block）-->
                        回答
                    </button>
                </div>

            </form>
        </div>
    </main>
</body>

</html>