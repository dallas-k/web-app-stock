<?php
// Local JSON 파일 읽어오기

$url ='stock.json';

if(!file_exists($url)) {
    echo '파일이 없습니다.';
    exit;
}

$json_string = file_get_contents($url);
$R = json_decode($json_string, true);
// json_decode : JSON 문자열을 PHP 배열로 바꾼다
// json_decode 함수의 두번째 인자를 true 로 설정하면 무조건 array로 변환된다.
// $R : array data
echo '<pre>';
print_r($R);
echo '</pre>';



// 자료 파싱처리

foreach ($R as $key => $value) {
    if (!is_array($value)) {
        echo $key . '=>' . $value . '<br/>';
    } else {
        foreach ($value as $key => $val) {
            if (!is_array($val)) {
                echo $key . '=>' . $val . '<br/>';
            } else {
                foreach ($val as $key => $final) {
                    echo $key . '=>' . $final . '<br/>';
                }
            }
        }
    }
}
?>