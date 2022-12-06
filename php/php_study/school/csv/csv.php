<?PHP
$file = new SplFileObject ('read.csv');

$file->setFlags(SplFileObject::READ_CSV);


$i =1;
$flg =true;
var_dump($file);
echo "<br>";
foreach($file as $line)
{
	if($line[0] === null) continue;
	$divDate = explode('-' , $line[1] );
	//preg_match:正規表現によるマッチングを行う
	//trim:文字列の先頭および末尾にあるスペースをの取り除く
	//checkdate:「月」「日」「年」の順番
	if(preg_match('/^[0-9]{4}$/',trim($line[0])) ===0       ||
		checkdate($divDate[1],$divDate[2],$divDate[0]) ===false ||
		preg_match('/^[0-9]$/',$line[2]) ===0)
	{
		echo $i."行目にエラーがあります<br/>";
		$flg = false;
	}
	$i++;
}
if($flg ===true)		
{

	echo "正常に終了しました";

}
//$fp = fopen("read.sv","r");
//$i = 1;
//$flg = true;
//
//while($res = fgetcsv($fp,"1024")){
//$divDate = explode("~",$res[1]);
//if(preg_match('/^[0-9][4]$/',trim($res[0]))===0||
//	checkdate($divDate[1],$divDate[2],$divDate[0])=== false||
//	preg_match('/^[0-9][1]$/',$res[2]) === 0)
//{
//	echo $i."行目にエラーがあります<br>";
//	$flg = false;
//}
//$i++;
//	}
//if($flg ===true){
//	echo "正常に終了しました";

//}



 /*
	 正規表現:http://okumocchi.jp/php/re.php

	 .なんでもいい1文字を表す
	 ^先頭を意味する
	 $終わりを意味する
	 *直前の文字がなし、また1つ以上連続する
	 +直前の文字が最低でも1つ以上連続する
	 ?直前の文字がなし、また1つだけ
	 ||で区切られた文字列のいずれか
	 [][]内の文字のいずか
	 [ABC]AかBかC

	 ()グループ化する
	 (ABC)+
	 ABCDABC

	 ABかCかどれか?
	 (AB|C)

	 W(indows|)
	 [n] n回一致する
	 [n,] n回以上一致する
	 [m,n] m回以上、n回以下に一致する

	 a-z アルファベットaからzまで
	 A-Z アルファベットAからZまで
	 0-9 数字の0から9まで
	 |d 数字の0から9まで
  */
?>
