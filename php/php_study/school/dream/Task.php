<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" charset="utf-8"/>
	<title>予習</title>
	<style>


	</style>
</head>


<body>
<?PHP
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

<?PHP

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

</body>
</html>
