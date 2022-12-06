<?PHP

$var = 1;
$var2 ="1";
$name = '斎藤';
var_dump($var);
var_dump($var2);
var_dump($name);
echo "<br>";
//配列:arrayで定義、値はカンマで区切る
$arr = array("saito","tomohiko","chiba","PHP");
var_dump($arr);
echo "<br>";
echo "<br>";
//自動的に番号が振られている(ただし0から始まる)ので個別の配列は以下のようにアクセスできる	
echo $arr[0];
echo "<br>";
echo "<br>";

echo $arr[1];
echo "<br>";
echo "<br>";

//配列を追加したいときは番号で入れてあげればよい。その時の入れ方は普通の変数と一緒
$arr[4] = "man";
var_dump($arr);
echo "<br>";
echo "<br>";

//以下のような形で値を変えることもできる
$arr[2] = "tokyo";
var_dump($arr);
echo "<br>";
echo "<br>";

//連想配列(ラベルを付けた配列):key => valueという構成。=>(ダブルアロー)
$label_arr = array(
	"family_name" => "saito",
	"first_name"  => "tomohiko",
	"pref"        => "chiba",
	"language"    => "PHP"
);
var_dump($label_arr);
echo "<br>";
echo "<br>";

//個別の値にはkeyでアクセスする
echo $label_arr["language"];
echo "<br>";
echo "<br>";

//配列を追加したい時はkeyを添えて入れてあげる感じ
$label_arr["hobby"] = "baseball";
var_dump($label_arr);
echo "<br>";
echo "<br>";

//以下のような形で値変えることもできる
$label_arr["language"] = "Perl";
var_dump($label_arr);
echo "<br>";
echo "<br>";



//多次元配列:エクセル形式のような配列。以下はイメージ// family_name first_name pref language
//0 saito tomohiko chiba PHP
//1 tanaka youhei tokyo C
//2 satou ichirou kanagawa Java

//配列の中に、配列を入れる(カンマを忘れないように!)
//$arr = array("saito","tomohiko","chiba");
$excel_arr = array(
	array(
		"family_name" => "saito",
		"first_name"  => "tomohiko",
		"pref"        => "chiba",
		"language"    => "PHP"
	),
	array(
		"family_name" => "tanaka",
		"first_name"  => "youhei",
		"pref"        => "tokyo",
		"language"    => "C"
	),
	array(
		"family_name" => "satou",
		"first_name"  => "ichirou",
		"pref"        => "kanagawa",
		"language"    => "Java"
	)

);

var_dump($excel_arr);
echo "<br>";
echo "<br>";

//個別の配列は番号とKeyでアクセスできる。
var_dump($excel_arr[1]);
echo "<br>";
echo "<br>";
echo $excel_arr[0]["language"];
echo "<br>";
echo "<br>";


//配列へのアクセスの仕方
echo $excel_arr[1]["pref"];
echo "<br>";
echo "<br>";
$excel_arr[1]["pref"] = "osaka";
var_dump($excel_arr);
echo "<br>";
echo "<br>";

//値を追加したい時は番号を入れてもよいが、array_pushや$arr2[] = $arrなど使うと自動的に入る
//番号を使う
$excel_arr[3] = array(
	"family_name" => "suzuki",
	"first_name"  => "jirou",
	"pref"        => "saitama",
	"language"    => "Perl"
);
var_dump($excel_arr);

//array_pushなどを使う
$arr = array(
	"family_name" => "suzuki",
	"first_name"  => "jirou",
	"pref"        => "saitama",
	"language"    => "Perl"
);
array_push($excel_arr , $arr);
//$excel_arr[] = $arrも全く同じ意味
var_dump($excel_arr);
//値を追加したい時は番号を入れてもよいが、array_pushや$arr2[]=$arrなどを使うと自動的に入る


?>
