<?php
$file = fopen(dirname(__FILE__) . "/stdin.txt", "r");
// ファイルの内容を一行ずつ配列に代入します
if ($file) {
    while ($line = fgets($file)) {
        $tmp[] = trim($line);
    }
}
///////////////////////////////////////////////////////
function all_chk($chara_1, $chara_2, $count_1, $count_2, $str)
{
    if (mb_substr($chara_1, -$count_2, $count_1) === $chara_2 or mb_substr($chara_1, 0, $count_1) === $chara_2) {
        $str = $chara_1;
    } elseif ($count_2 == 1) {
        $str =  $chara_1.$chara_2;
    } else {
        $str = $chara_1;
        $ans = "no_match";
    }
    return array($ans, $str);
}
function one_chk($chara_1, $chara_2, $count_1, $count_2, $str)
{
    //後ろの文字数分チェックする
    for ($s = 0; $s < $count_2; $s++) {
        $l = $s + 1;
        if ($s == 0) {
            $mbs = $chara_2;
            $count_str_3 = $count_2;
        } else {
            $mbs = mb_substr($chara_2, 0, -$s);
            $count_str_3 = mb_strlen($mbs);
        }
        //var_dump(mb_substr($chara_1, -$count_str_3, $count_1) === $mbs);
        if (mb_substr($chara_1, -$count_str_3, $count_1) === $mbs) {
            //var_dump(mb_substr($chara_2, $count_str_3, $count_2));
            $d = mb_substr($chara_2, $count_str_3, $count_2);
            $str = $chara_1 . $d;
            break;
        } elseif ($l == $count_2) {
            $str = $chara_1 . $chara_2;
                //var_dump($count_str_2);
        }
    }
    return $str;
}
///////////////////////////////////////////////////////
for ($i = 0; $i < 3; $i++) {
    $t = $i + 1;
    $chara[] = $tmp[$t];
}
$new_word = "";
$count = count($chara);
//最初の単語の文字数をカウント
$count_str_0 = mb_strlen($chara[0]);
//単語の数だけ回す
for ($i = 0; $i < $count; $i++) {
    //カウントにプラス
    if ($i < $count) {
        $plus = $i + 1;
    }
//前の単語
    $str_1 = $chara[$i];
//後ろの単語
    $str_2 = $chara[$plus];
//前の単語の文字数をカウント
    $count_str_1 = mb_strlen($chara[$i]);
//後ろの単語の文字数をカウント
    $count_str_2 = mb_strlen($chara[$plus]);
    if ($i == 0) {
        $str_0 = $chara[0];
        $count_str_0 = mb_strlen($chara[0]);
    } else {
        $str_0 = $new_word;
        $count_str_0 = mb_strlen($new_word);
    }
    list($ans, $str) = all_chk($str_0, $str_2, $count_str_0, $count_str_2, $new_word);
        //一文字だけだったので結合する
    if ($ans == "no_match") {
        $new_word =one_chk($str_0, $str_2, $count_str_0, $count_str_2, $new_word);
    } else {
        $new_word = $str;
    }
}
echo $new_word;
// ファイルパスを閉じる
fclose($file);
