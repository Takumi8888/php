<?php

function searchCityTime($city_name)//ユーザー定義関数（関数の定義は「function 関数名()」の形式で記述する）
{
    require('config/cities.php'); //search_city_time.phpファイルにcities.phpファイルを読み込む（require関数は外部ファイルの読み込みを実行する。require：複数回読み込み(定義を呼び出し)可能、require_once：一度読み込んだファイルは読み込まない）

    foreach ($cities as $city) {//cities.phpファイルの$cities配列内の各$cityデータが取得対象となる
        if ($city['name'] === $city_name) {//cities.phpファイルの各$cityデータのnameとresult.phpファイル（関数の使用先）が読み込んだ$city_nameが一致していれば実行
            $date_time = new DateTime('', new DateTimeZone($city['time_zone']));//new DateTimeZoneにて特定の都市の現在時刻を表示する（cities.phpファイルにて各$cityデータのtime_zoneを指定する）
            $time = $date_time->format('H:i');//$date_timeで取得した値の出力形式をformat()で指定する
            $city['time'] = $time;//cities.phpファイルの$cities配列内にtime要素を追加する

            return $city;
        }
    }
}