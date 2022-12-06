<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無題ドキュメント</title>
</head>

<body>

<?PHP
echo "課題<br/>";

$kazu1 = $_POST ["nen"];
$kazu2 = $_POST["nen1"];
$kazu3 = $_POST ["nen2"];
$kazu4 = $_POST["nen3"];

$kaz= $kazu1 % 2;




if($kaz == 0){
echo "偶数です<br><br>";
	}

else{
 echo "奇数です。</br></br>";
 }

echo "課題2<br/>";

if($kazu2 > $kazu3 ){
	echo"左が大きい</br></br>";
	}
elseif($kazu2 < $kazu3 ){
 echo"右が大きい</br></br>";
 }
else{
 echo"２つは同じ値</br></br>";
 }

echo "課題3<br>";
if($kazu4 <= 10){
	echo"正解です</br></br>";
	}
else{
 echo "不正解です</br></br>";
 }

echo "課題4<br>";
switch($kazu4){
	case 1:
     echo "成績は1です。もっとがんばりましょう。</br></br>";
	 break;
	case 2:
    echo "成績は2です。もう少しがんばりましょう。</br></br>";
    break;

    default:
    print "がんばり過ぎです。</br></br>";
    break;
}

echo "課題5<br>";
$das=10;

echo "1-10までの偶数を出力します。</br>";

for($i=1; $i <= $das; $i++){
	if(($i % 2) == 0)
	echo  "{$i}</br>";
}


?>

<table border="2">

<?PHP
echo "課題6<br>";

for($i=1;$i<=9;$i++){
echo "<tr>";
for($j=1;$j<=9;$j++){
	echo "<td>".$i*$j."</td>";

}

}

echo "</tr>";

?>

</table>



<?PHP
echo "課題7</br>";

$ten=array("80","60","22","50","75");


$max="";



?>


<table border="2">
<tr bgcolor="#AAAAAA">
<th>番号</th>
<th>点数</th>
</tr>


<?PHP

foreach ($ten as $id =>$value){
        if($max < $ten[$id])
           $max = $ten[$id];


echo "<tr><td>{$id}</td><td>{$value}</td></tr>";

}


?>

</table>

<?PHP

echo   "最高点は{$max}です。</br>";


?>

<table border="2">
<?PHP
echo "課題8</br>";
$word=array("a","i","g","e","b","r","a");
echo "<tr><td>変換前</td><td>";


foreach($word as $value){
	echo $value;

}
echo "</td></tr>";

for($i=0; $i<count($word); $i++){

if($word [$i] == "a")
  $word [$i] = "b";

}
echo "<tr><td>変換後</td><td>";


foreach($word as $value){
	echo $value;

}

echo "</td></tr>";





?>
</table>

<?PHP
echo "課題9</br>";
$num = 5;


$ans =square($num);


echo "{$num}の2乗は{$ans}です。<br/>";


function square($x)
{

return $x * $x;

}





?>

<?PHP
echo "課題10</br>";
$cr1= new Car (1234,25.5);

$cr2= new Car (2345,30.5);

?>


<table border="2">
<tr bgcolor="#AAAAAA">
<th>ナンバー</th>
<th>ガソリン</th>
</tr>


<?PHP

echo "<tr><td>";
echo $cr1->getnumber();
echo "</td><td>";
echo $cr1->getgas();
echo  "</td></tr>";


echo "<tr><td>";
echo $cr2->getnumber();
echo "</td><td>";
echo $cr2->getgas();
echo  "</td></tr>";





?>

</table>


<?PHP
echo "課題11</br>";
class Car
{
   private $number = 0;
   private $gas = 0.0;


   public function __construct($nm,$gs)
   {
	$this->number = $nm;
	$this->gas = $gs;
   }

    public function getnumber(){return $this->number;}
	public function getgas(){return $this->gas;}
}


?>


<?PHP

$a = 0;

for($i=0; $i<5; $i++)
  func();

function func()
{
	global $a;
    $b = 0;
    static $c = 0;

    echo "<hr>";
	echo "変数\$aは{$a}変数\$bは{$b}変数\$cは{$c}です。<br/>";


$a++;
$b++;
$c++;


}





?>
<?PHP
/*
$as="鉛筆";
$sa="個";

buy($as , $sa);

echo "あれ";

buy("消しゴム","個");




function buy($spr,$ps)
{
echo "<hr/>\n";
echo "".$spr."と".$ps."お買い上げありがとうございました<br/><hr/>\n";
echo "<hr/>\n";


}
//functionで複数の引数を指定する際は、右から順にデフォルトを指定する。
*/


echo "課題12</br>";
$as="鉛筆";
$sa="50";
$sw="10";

$total=buy($as , $sa , $sw );


echo "合計".$total."円です。";






function buy($spr,$ps,$sad)
{
echo "<hr/>\n";
echo "".$spr."を".$ps."円で".$sad."個お買い上げありがとうございました<br/><hr/>\n";//値はきちん降りてきている。
echo "<hr/>\n";


$tt=$ps*$sad;
return $tt;

//returnで値を返して、totalに代入している。
}



?>
<form action="../../menu/0-0.html" method="post"/>

<input type="submit" name="submit"value="メニューへ">

</form>







</body>
</html>
