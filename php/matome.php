<?php
//配列の動き
//要素の追加
$arr_1 = array(
	"名前"=>"清水",
	"年齢"=>"32歳",
	"出身"=>"埼玉",
	"言語"=>"PHP",
	"好きな食べ物"=>"寿司"
);

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
echo "<br/><br/>";
$excel_arr[] = $arr_1;

//var_dump($excel_arr);
foreach($excel_arr as $key => $val){
	//var_dump($val);
	if($val["language"]=== "PHP"){
	echo $val["family_name"] ."<br/>" ;
	
	
	}
}
$err_msg ='';

$name = (isset($_POST['name']) === true)? $_POST['name']:'';

if(isset($_POST["send"] ) === true ){
	if($name ==='') $err_msg ='名前を入れてください';

	if($err_msg ==='' )
	{
		echo "ok";
	}


}


$arr = array(
    array(
    "名前"=>"清水",
    "年齢"=>"32",
    "出身"=>"埼玉",
    "言語"=>"PHP",
    "好きな食べ物"=>"寿司"
    ),
    array(
    "名前"=>"山田",
    "年齢"=>"31",
    "出身"=>"千葉",
    "言語"=>"PHP2",
    "好きな食べ物"=>"肉"
        
    ),
    array(
    "名前"=>"高橋",
    "年齢"=>"33",
    "出身"=>"久喜",
    "言語"=>"PHP3",
    "好きな食べ物"=>"野菜"
        
    )
);
//ここから追加

$uparr =array("好きな音楽"=>"rock");
$countarr = count($arr);
//2つの方法
for($i=0;$i<$countarr;$i++){
    $plasarr[] =array_merge($arr[$i],$uparr);
    $arr[$i]["好きなスポーツ"] = "野球"; 
}
var_dump($arr);
echo "</br>";
echo "</br>";
//関数
function fcase($name,$age,$like){
    echo "名前は".$name."さんで、年齢は".$age."で、好きな音楽は".$like."です";
}

for($i=0;$i<$countarr;$i++){
fcase($arr[$i]["名前"],$arr[$i]["年齢"],$arr[$i]["好きな音楽"]);
echo "</br>";
}

//関数2
$price = 1000;
$price2 = calc($price);
echo $price2;

function calc($price){ 
$price = 1.2 * $price;
$price2 = $price * TAX;
return $price2;
//戻り変数がある場合はreturnを使う
}

//ここから配列へのアクセス
$start_month=6;
$last_month=8; for($i=$start_month;$i<=$last_month;$i++){
$arrMonth[] = $i."月"; 
}
$arrShop = array("A","B");
 $arrCol = array("個数","売上");
  $arrShopSales = array();
foreach( $arrMonth as $month){ 
foreach( $arrShop as $shop ){
foreach( $arrCol as $col ){ $arrShopSales[$month][$shop][$col] =0;
}
}
}

//var_dump( $arrShopSales); 
$fp =fopen("sales.csv","r"); 
$arrShopSales = array(); 
while( $res = fgetcsv( $fp )) {
$month = $res[0]; 
$shop = $res[1];
getInitArr( $month, $shop, $arrShopSales );
$arrShopSales[$month][$shop]["個数"] += $res[2];
$arrShopSales[$month][$shop]["売上"] += $res[3]; 
}
//定義 2 でソートした場合は以下の方法で 
sortMonthAndShop( $arrShopSales );
function sortMonthAndShop( &$arrShopSales ){
ksort( $arrShopSales );
foreach( $arrShopSales as $month => &$shopSales ){ 
ksort( $shopSales );
}
}
//定義方法その2
function getInitArr( $month, $shop ,&$arrShopSales){
if( isset( $arrShopSales[$month][$shop] ) === false ){
$arrShopSales[$month][$shop]["個数"]=0;
$arrShopSales[$month][$shop]["売上"]=0; 
}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> <html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>店舗ごとの売上</title> </head>
<body>
<table border="1px"> <tr>
<th>月</th> <th>商品数</th> <th>個数</th> <th>売上</th>
</tr>
<?php foreach( $arrShopSales as $month => $shopSaleData): ?> <tr>
<td rowspan="<?php echo count($shopSaleData);?>"><?php echo $month; ?></td> <?php foreach( $shopSaleData as $shop => $sale): ?>
<td><?php echo $shop;?></td>
<td><?php echo $sale["個数"];?></td>
<td><?php echo $sale["売上"];?></td>
</tr>
<? endforeach;?> </tr>
<? endforeach;?>
</table>
<?php //データを一次元で定義する場合はこちら
$arrShopSales = array();
foreach( $arrMonth as $month ) {
foreach( $arrShop as $shop) {
$shopSale = array( "month"=> $month, "shop" => $shop,
);
foreach( $arrCol as $col ){ $shopSale[$col] =0;
}
$arrShopSales[]= $shopSale; 
}
}
//var_dump($arrShopSales);
 $fp =fopen("sales.csv","r"); 
 while( $res = fgetcsv( $fp )){
$month = $res[0]; 
$place = $res[1];
foreach( $arrShopSales as $index => $shopSale ) {
//月と店舗で合致するものを取得
if( $month === $shopSale["month"] && $place === $shopSale["shop"]) {
$arrShopSales[$index]["個数"] += $res[2];
$arrShopSales[$index]["売上"] += $res[3]; 
}
}
}
?>
<?php
class myClass
{

    public function myKaibun()
    {
		$count = array();
        for($str = 1;$str <= 10000; $str++){
			if($str%7 == 0){
				
        //echo "Checking this word ----> " . $str . "は<br>";
        $len = strlen($str);
		$palindrome = TRUE;
		//半分の数だけ繰り返し
        for ($x = 0; $x < $len / 2; $x++) {
            if (substr($str,$x,1)!= substr($str,$len - $x - 1,1)) {
				
                $palindrome = FALSE;
            }
        }
        if ($palindrome) {
			$count[] = $str;
            //echo "回文数です!<br>";
        } else {
           // echo "回文数ではありません!<br>";
        }
			}
		}
		$cnt = count($count);
		echo "問3.1以上10000以下の7の倍数のうち、回文数は".$cnt."個あります";
		}
}


function mcount()
{

	$str = $_POST['checkm'];
	$check1 = '.';
	$check2 = ',';
	$check3 = '　';

	$str1 = substr_count($str, $check1);
	$str2 = substr_count($str, $check2);
	$str3 = substr_count($str, $check3);


	return array($str1, $str2, $str3);


}
//1回目=配列から文字列を出して、分解して、タグの始まりかどうか判定して
function brace_check($src, $i = 0, $want = null)
{
	//外からアクセス可能に
	static $map = array(
		'[' => ']',
		'(' => ')',
		'{' => '}',
		']' => '',
		')' => '',
		'}' => '',
	);
	//文字列の長さをはかる
	$len = strlen($src);
		//文字列が2文字だとしたら
	for (; $i < $len; $i++) {
		//一文字づつ空かチェック
		$c = $src[$i];

		//下のbrace_checkで$wantに$mapの対応括弧が入っているので、それとマッチしたら1を返す
		if ($c === $want) {
			return $i;
		}
		//配列のキーを指定して要素が空じゃないか
		if (isset($map[$c])) {
			//閉じタグではないかチェック
			if ($map[$c] === '') {
				//例外が発生したら下記メッセージ、sprintfは特定の文字フォーマットにunexpectedは予想外
				throw new Exception(sprintf('unexpected "%s" on %d char', $c, $i + 1));
			}
			//関数の戻り値にプラスして配列にキー指定して変数i代入
			$i = brace_check($src, $i + 1, $map[$c]);
			//var_dump($i);
		}
	}
	if ($want !== null) {

		throw new Exception("unexpected end of file");
	}
}

// $expressions = array(
// 	")()",
// 	"(()(())()((()()))())",
// 	"([])",
// 	"{()[]}",
// 	"([)]",
// 	"[({})",
// );

$src = $_POST['brackets'];

//配列の要素全てに特定の処理,無名関数で引数を配列に
/* array_map(function ($src) {
	try {
		brace_check($src);
		echo "OK: $src\n";
	} catch (Exception $ex) {
		//例外メッセージを取得する
		echo "NG: $src ... {$ex->getMessage()}\n";
	}
}, $expressions);
 */
?>

<form action="" method="post">
	<table>
		<tr>
			<td>
				問1.カンマ(,)ピリオド(.)空白の数を数える:<input type="text" name="checkm">
			</td>
		</tr>

		<tr>
			<td>
				問2.対応する括弧があるか判定する<span style="margin-right: 1.7em;"></span>:<input type="text" name="brackets">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="送信">
			</td>
		</tr>
	</table>
</form>

<?php

$countsum = array_sum(mcount());
list ($str1, $str2, $str3) = mcount();

//var_dump($countsum);
echo "ピリオドの数は" . $str1 . "個です</br>";
echo "カンマの数は" . $str2 . "個です</br>";
echo "空白の数は" . $str3 . "個です</br></br>";
echo "合計は" . $countsum . "個です</br></br>";


try {
	brace_check($src);
	echo "入力された括弧はすべて対応する括弧があります(TRUE)<br><br>";
} catch (Exception $ex) {
	//例外メッセージを取得する
	echo "入力された括弧に対応する括弧がないものがあります(FALSE)<br><br>";
}

$a = new myClass();
$a->myKaibun();

?>

<table>
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