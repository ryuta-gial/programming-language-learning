<?php
// ファイルパスの指定
$file = fopen(dirname(__FILE__) . "/stdin.txt", "r");

// ファイル内容の読み込み
$single_line_input_line = fgets($file);
// 入力値の分解
$array = explode(" ", $single_line_input_line);
// ファイルパスを閉じる
fclose($file);

var_dump($array);
