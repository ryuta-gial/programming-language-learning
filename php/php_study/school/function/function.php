<?PHP
define("TAX",1.08);//定数
say_hello("matsumoto");
say_hello("tanaka");
say_hello("watanabe");
say_hello("katou");
//say_hello();/

say_hello2();
say_hello2("kazuma");

say_hello3("matsumoto",34);
$price = 1000;
echo $price.'<br>';

$price2 = calc($price);
echo $price2;
echo "<br>";
//echo calc().'<br>'
//echo $price2;
echo $price.'<br/>';
//関数の外の$priceは変わらないことに注意
//関数の中と外では別の変数
//
function say_hello($name){
	echo "hi　".$name."<br/>";
	echo "your name is　" .$name. "<br/>";
	echo "<br>";
}

function say_hello2($name="hoge"){
//初期値ではhoge。変数であればその値を使う
echo "hi　".$name."<br/>";
echo "your name is" .$name. "<br/>";
echo "<br>";
}
function say_hello3($name,$age){
echo $name."　is　".$age."years old"."<br/>";
}
/*参考問題　引数2つ $name ,$fine_flg
 晴れ(true)なら　$name さんいい天気ですね。
 雨(false)なら $name さん今日は雨ですね。
*/
function say_weather($fine_flg)
{
	if(!$fine_flg){
	}	
}
function calc($price)
{
	$price = 1.2 * $price;
	$price2 = $price * TAX;
	return $price2;
        //戻り変数がある場合はreturnを使う
}
?>

