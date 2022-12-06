<html>
<head>
    <meta http-equiv="Content-Type"charset = "utf-8"/>
    <title>課題</title>
<style type="text/css">
<!--
table{
    width:100px;
}
.textc{
    text-align:center;
    }
td {
    white-space: nowrap;
    text-align:left;
    height: 50px;
    font-size: 13px;
}
--->
</style>

</head>

<body>
<table border="1">
<tr><td class="textc">番号</td><td class="textc">課題</td><td class="textc">表示</td></tr>
<tr><td class="textc">１</td><td>“Hello  world!”と表示してください。</td>
<td>
<? 
echo "Hello  world!"
;?>
</td></tr>
<tr><td class="textc">２</td><td>変数aに”PHP”、変数bに”school”をいれてPHPschoolと表示してください。</td>
<td>
<? 
$a ="PHP";
$b ="school";
echo "$a"."$b";
?>
</td></tr>
<tr><td class="textc">３</td><td>変数nに10を入れて、5を足した後に、表示してください</td>
<td>
<? 
$n = 10;
$n +=5;
echo "$n";
?> 
</td></tr>
<tr><td class="textc">４</td><td>消費税率1.05を定数で定義し、金額2000円の税込金額を表示してください。</td><td>
<? 
const FOO =1.05;
$a = 2000*FOO;
echo $a;
?>
</td></tr>
<tr><td class="textc">５</td><td>変数aが80点以上なら"congratulation"、60点以上～80点未満なら”OK”、60点未満なら”Dont mind”と表示してください。。</td><td>
<?
$a = 80;
 
if($a <= 80){
   echo "congratulatio";
   }else{
   echo"Dont mind";
}
?>
</td></tr>
<tr><td class="textc">６</td><td>変数id、nameが両方空文字でない場合、”ＯＫです。”、そうではない場合には”idまたはpassを入力してください。”と表示してください。</td><td>
<?
 $id = "";
$name ="空" ;
if($id = ""&$name=""){
echo "OKです。";
}else{
echo "idまたはpassを入力してください。";
}
?>
</td></tr>
<tr><td class="textc">７</td><td>以下のように配列が定義されています。
$arr　=　 array('aaa','bbb','ccc')
bbbを表示してください。</td><td>
<?
$arr= array('aaa','bbb','ccc');
echo "$arr[1]";
?>
</td></tr>
<tr><td class="textc">８</td><td>forかwhile文を使って、0.1を10回足し算するプログラムを作りなさい。</td><td>
<? 
$x = 0.1;
$count = 0;
while($count < 10){
$x  += 0.1;
$count++;
}
echo "$x";
?>
</td></tr>
<tr><td class="textc">９</td><td>今の日付を分まで以下のように表示してください。例：2013年7月3日19時20分</td><td>
<?
 $time =date("Y年n月d日 H時i分");

echo "$time";
?>
 </td></tr>
<tr><td class="textc">10</td><td>以下のような文字列があります。これをexplodeを使いカンマで分割して、配列に格納してください。
$str = "apple,orange,peach"</td><td>
<?
$str = "apple,orange,peach";

$pieces = explode(",",$str);

print_r($pieces);
?>
 </td></tr>
<tr><td class="textc">11</td><td>変数zipを正規表現で郵便番号(ハイフンなし)かどうかをpreg_matchを使ってチェックし、正しければOK、正しくなければNGと表示してください。</td><td>
<form action="" method=post>
郵便番号を「111-2222」の形で入力して［送信］をクリックしてください。<br/>
<input type="text" name="zip" size="10" maxlength="8" id="zip"/><br/>
<input type="submit" value="送信"/></br/><br/>
</form>
<?
$zip = mb_convert_kana($_REQUEST['zip'],'a','utf-8');
if(preg_match("/^\d{3}\-\d{4}$/",$zip)){
echo"OK";
}else{
echo"NG";
}
?>
 </td></tr>
<tr><td class="textc">12</td><td>1から10までを表示させるプログラムを作りなさい。また、3の倍数の時は太字で表示してください。</td><td>
<?
for($i = 0; $i <= 10; $i++){
	if(($i % 3) == 0){
		echo "<b>";
		echo "$i";
		echo"</b>";
	}else{
	echo "$i";
	}
}
?>
 </td></tr>
<tr><td class="textc">13</td><td>1+2+3+・・・100までを足すプログラムを作り、和を表示してください。</td><td>
<?
$x=1;

For($i =2; $i<=100; $i++){
$x+=$i;
}
echo "$x";
?>
 </td></tr>
<tr><td class="textc">14</td><td>1+2+3+・・を足すプログラムを作り、10000を超えた時点で足し算を終了させ、末尾の数字と和を表示してください。</td><td>
<? 
$d =1;

for($i = 2; $i <= 10000; $i++){
	$d +=$i;
}
	echo "$d";
	echo"<br/>";
	echo mb_substr($d,-1);
	echo "<br/>";
?></td></tr>

</table>
</body>
</html>
