<?php
//文字列検索サンプル

$moji = "隣の竹やぶに竹立てかけたのは、竹立てかけたかったから竹立てかけたのさ";
 
$pos =  mb_strpos($moji, "竹"); //$mojiの先頭から「竹」を探す
 
echo $pos;
 
echo "<br>";
 
$pos2 =  mb_strrpos($moji, "竹"); //strposではなく、strrposとrが増える
 
echo $pos2;

if (substr($str,  0, strlen($prefix)) === $prefix) {
    // Match
}