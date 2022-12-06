<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transiitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta chrset="Utf-8">
</head
<body>
<?PHP

$arr = array(
	"name" => "松本",
	"age" => "33",
	"pref" => "千葉",
	"sex" => "男"
);
foreach($arr as $key => $val)
{

	echo $key;
	echo $val."<br><br>";

}

$arr[5] = array("language"=>"PHP");	

var_dump($arr);
echo "<br><br>";

$thai = array(
	array(
		"name"=>"田中",
		"age"=>"22",
		"pref"=>"千葉",
		"sex"=>"男",
		"language"=>"C"),
	array(
		"name"=>"鈴木",
		"age"=>"19",
		"pref"=>"東京",
		"sex"=>"女",
		"language"=>"Java"),
	array(
		"name"=>"吉田",
		"age"=>"27",
		"pref"=>"神奈川",
		"sex"=>"男",
		"language"=>"C++")
);

$thaip =array("name"=>"渡辺","age"=>"26","pref"=>"大阪","sex"=>"男","language"=>"Perl");

var_dump($thai);

echo "<br><br>";
array_push($thai,$thaip);

var_dump($thai);

echo "<br><br>";

echo '<table border="1px">';
echo'<tr>';
echo '<td>name</td>';
echo '<td>age</td>';
echo '<td>pref</td>';
echo '<td>sex</td>';
echo '<td>language</td>';
echo '</tr>';


foreach($thai as $key){


	echo "<tr>";
	echo "<td>".$key['name']."</td>";
	echo "<td>".$key['age']."</td>";
	echo "<td>".$key['pref']."</td>";
	echo "<td>".$key['sex']."</td>";
	echo "<td>".$key['language']."</td>";
	echo "</tr>";

}
echo '</table>';

echo "<br><br>";
$thai_2 = array(
	array(
		"code" => "A0001",
		"product" => "白菜(1玉)",
		"price" => "298"
	),
	array(
		"code" => "K0001",
		"product" => "いわし(5尾)",
		"price" => "240"
	),
	array(
		"code" => "A0002",
		"product" => "九条葱(1パック)",
		"price" => "258"
	),
	array(
		"code" => "A0003",
		"product" => "サツマイモ(1袋)",
		"price" => "180"
	),
	array(
		"code" => "K0002",
		"product" => "きびだんご(1皿)",
		"price" => "180"
	)

);
var_dump($thai_2);

echo "<br><br>";

echo '<table border="1px">';
echo'<tr>';
echo '<td>code</td>';
echo '<td>product</td>';
echo '<td>price</td>';
echo '</tr>';

$price = array();
$product = array();
foreach($thai_2 as $key2){


	echo "<tr>";
	echo "<td>".$key2['code']."</td>";
	echo "<td>".$key2['product']."</td>";
	echo "<td>".$key2['price']."</td>";
	echo "</tr>";
	$price[] = $key2['price'];
	$product[] = $key2['product'];
}

echo '</table>';






$price_sum = array_sum($price);
$product   = count($product);

echo "合計金額は".$price_sum."円です。<br>";
echo "個数は".$product."個です。";

$thai_3 = array(
	array(
		"name" => "山田",
		"age" => "19",
		"sex" => "1"
	),

	array(
		"name" => "鈴木",
		"age" => "22",
		"sex" => "0"
	),
	array(
		"name" => "田中",
		"age" => "18",
		"sex" => "1"
	),
	array(
		"name" => "渡辺",
		"age" => "25",
		"sex" => "0"
	),
	array(
		"name" => "佐藤",
		"age" => "33",
		"sex" => "1"
	)
);



echo "<br><br>";

echo '<table border="1px">';
echo'<tr>';
echo '<td>name</td>';
echo '<td>age</td>';
echo '<td>sex</td>';
echo '</tr>';



foreach($thai_3 as $key3){


	echo "<tr>";
	echo "<td>".$key3['name']."</td>";
	echo "<td>".$key3['age']."</td>";
	if($key3['sex']==="0"){
		echo "<td>女</td>";
	}else{
		echo "<td>男</td>";
	}
	echo "</tr>";

}

echo '</table>';




foreach($thai_3 as $key3){
	if($key3['age']>=20){
		echo $key3['name']."さん、飲みすぎには注意しましょう!<br>";
	}
	else{
		echo $key3['name']."さんは未成年なのでまだお酒は飲めません<br>";
	}


}

echo "<br>";

$men_sum = array();
$men_ave = array();

$girl_sum = array();
$girl_ave = array();

foreach($thai_3 as $key3){
	if($key3['sex']==="1"){
		$men_sum[] = $key3['name'];
		$men_ave[] = $key3['age'];

	}
	else{
		$girl_sum[] = $key3['name']; 
		$girl_ave[] = $key3['age'];

	}


}
$men_ave = array_sum($men_ave);
$men_sum = count($men_sum);
$mave    = round($men_ave / $men_sum);
$girl_ave= array_sum($girl_ave);
$girl_sum = count($girl_sum);
$gave     = round($girl_ave / $girl_sum);


echo "男性メンバー".$men_sum."人(平均年齢".$mave."才)<br>";


echo "女性メンバー".$girl_sum."人(平均年齢".$gave."才)<br>";




?>
</body>
</html>
