<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta chrset="Utf-8">
 <title></title>
</head>
<body>
<?PHP
echo '斎藤　友彦';
echo "<br>";
echo "サイトウ トモヒコ";
echo "<br>";

$x = "10";

/*コメントアウトスタート
コメントアウト終わり*/
//==大体同じ
//===ちゃんと(変数の型が)同じ
echo "<br>";

$id = 0;
if($id ==="")
{

	echo "empty";
}
else
{
	echo "not empty";

}
echo "<br>";


if($x === 10)
{

	echo "10";
}
else
{

	echo "not 10";

}
echo "<br><br>";


//変数名はわかりやすく!
$my_score = 70; //文字
//$a = "70"; //文字
if($my_score >=80)
{
	echo "がんばりましたね";

}
elseif($my_score >= 60)
{

	echo "もう一歩です";

}
elseif($my_score >= 40)
{

	echo "頑張りましょう";


}
else
{

	echo "ダメダメです";

}
echo "<br>";


$a = 10;
$c = 7;


//&&(アンパサンド) →両方とも(AND条件)
//||(パーティカルバー/ライン,縦線) →片方満たせばOK(OR条件)
if($a === 10 && $c === 8)
{
	echo "ok";

}
else
{
	echo "NG";

}
echo "<br>";

//!==(!=)否定
//$a ==="" ←空白、未入力
$a ='0';
if(empty($a)=== true)
{

	echo "空(カラ)です";

}
echo "<br>";

if($a !='')
{

	echo "値が入っています。";

}
else
{
	echo '空白です';

}

?>
</body>
<html>
