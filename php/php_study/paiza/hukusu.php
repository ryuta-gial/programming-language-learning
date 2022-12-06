<?PHP
// ファイルパスの指定
$file = fopen(dirname(__FILE__)."/stdin.txt", "r");

// ファイルの内容を一行ずつ配列に代入します
if ($file) {
    while ($line = fgets($file)) {
        $tmp[] = trim($line);
    }
}
//var_dump($tmp);
// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
    $array[] = explode(" ", $value);
}


// ファイルパスを閉じる
fclose($file);