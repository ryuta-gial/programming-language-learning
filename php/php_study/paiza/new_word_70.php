
<?php
/*
あなたは単語を組み合わせた新単語を作る事にハマっています。
新単語は N 個の文字列を、前から順に結合して作ります。
この時、冗長さをなくすため、 前から結合した単語の末尾 と 後ろの単語の先端 が一番長く一致するように結合します。

例えば、 入力例 1 の "paiza", "apple", "letter" の場合、
先頭から "paiza", "apple" を条件どおり重ねると "paizapple" となります。
この単語を更に次の単語と重ねると "paizappletter" となります。

なお、必ず前から順番に重ねるため、 入力例 2 の "poh", "p", "oh" を結合する場合は、"poh" と "p" を重ねた後の単語 "pohp" と "oh" を重ね "pohpoh" となります。

N 個の単語が与えられるので、前から順番に単語を結合した場合の新単語を出力してください。

※考えられる必要な処理
1.前の文字と単語全てが全マッチしたら結合させない(ok)
2.後ろの文字が1文字なら全マッチしていない時点で結合する(ok)
3.末尾と先頭が一部マッチしたら
マッチしていない部分を結合
4.上記にマッチしない場合、ただ結合する。




include('hukusu.php'); ?>
// 自分の得意な言語で
// Let's チャレンジ！！

//$input_lines = fgets(STDIN);
var_dump($array);
for ($i = 0; $i < $input_lines; $i++) {
$s = trim(fgets(STDIN));
$count_chara = mb_strlen( $s , 'UTF-8');
var_dump($count_chara);
var_dump($s);
echo $t .= $s;

}
 */
?>
<?php
// ファイルパスの指定
$file = fopen(dirname(__FILE__) . "/stdin.txt", "r");

// ファイルの内容を一行ずつ配列に代入します
if ($file) {
    while ($line = fgets($file)) {
        $tmp[] = trim($line);
    }
}

for ($i = 0; $i < 3; $i++) {
    $t = $i + 1;
    $chara[] = $tmp[$t];
}

$count = count($chara);
//最初の単語
$str_0 = $chara[0];

//最初の単語の文字数をカウント
$count_str_0 = mb_strlen($chara[0]);
//単語の数だけ回す
for ($i = 0; $i < $count; $i++) {
    
//カウントにプラス
  if($i < $count){
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
    
  //echo mb_substr($str_0, -$count_str_2 , $count_str_0);
  //exit;
  //var_dump($str_0);
   
  //前の単語の末尾と後ろの単語の先頭が全マッチするかもしくは単語の全部がマッチするか(マイナスが大事)
    if (mb_substr($str_0, -$count_str_2 , $count_str_0) === $str_2 or mb_substr($str_0, 0 , $count_str_0) === $str_2) {
    //マッチしたら何も処理せずスルー
    
     //後ろの文字が1文字なら全マッチしていないので、後ろに結合する。
      }else if($count_str_2  == 1){
          $str_0 = $str_0  . $str_2;
            
      }else{
        //マッチしてこなかったら、後ろの文字数分,先頭と末尾が部分マッチするかチェックする
        for ($s = 0; $s < $count_str_2; $s++) {
        $l = $s + 1;
        //var_dump($l);
            if($s == 0){
            $mbs = $str_2;
            $count_str_3 = mb_strlen($mbs);
            }else{
            $mbs = mb_substr($str_2, 0,-$s);
            $count_str_3 = mb_strlen($mbs); 
            }
            
            //マッチしたら、マッチした文字以降を結合させる
            if(mb_substr($str_0, -$count_str_3 , $count_str_1) === $mbs){
              $d = mb_substr($str_2, $count_str_3 , $count_str_2);
              $str_0 = $str_0  . $d;
               break;
               
            }else if($l ==  $count_str_2){
                $str_0 = $str_0  .  $str_2;  
                //var_dump($count_str_2);
            }
        }
        
}

}

echo $str_0 ;


// ファイルパスを閉じる
fclose($file);
?>