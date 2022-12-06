<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transiitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta chrset="Utf-8">
</head>
<body>
<?PHP
//1-1
setlocale(LC_ALL, 'ja_JP.UTF-8');
// フレームワークによって違うので省略
$filePath = './read_2.csv';


$filePath2 = './read_3.csv';


// 読み込んだSJISのデータをUTF-8に変換して保存
file_put_contents($filePath, mb_convert_encoding(file_get_contents($filePath), 'UTF-8', 'SJIS'));

// 読み込んだSJISのデータをUTF-8に変換して保存
file_put_contents($filePath2, mb_convert_encoding(file_get_contents($filePath2), 'UTF-8', 'SJIS'));

$file = new SplFileObject ($filePath);
$file->setFlags(SplFileObject::READ_CSV);



$file2 = new SplFileObject ($filePath2);
$file2->setFlags(SplFileObject::READ_CSV);



$i = 1;
$flg = true;

echo '<table border="1px">';
echo'<tr>';
echo '<td>name</td>';
echo '<td>age</td>';
echo '<td>pref</td>';
echo '<td>belong</td>';
echo '</tr>';

foreach($file as $lines)
{
	echo "<tr>";
	if($lines[0]=== null)continue;
	//var_dump($lines);
	foreach($lines as $value){

		echo "<td>".$value."</td>";

	}

	echo "</tr>";
}


echo "</table>";

echo "<br><br>";


//1-2
echo '<table border="1px">';
echo'<tr>';
echo '<td>月</td>';
echo '<td>店舗</td>';
echo '<td>売上商品数</td>';
echo '<td>売上(千円)</td>';
echo '</tr>';

$price_a6_1 = array();
$price_a6_2 = array();
$price_a7_1 = array();
$price_a7_2 = array();
$price_a8_1 = array();
$price_a8_2 = array();
$price_b6_1 = array();
$price_b6_2 = array();
$price_b7_1 = array();
$price_b7_2 = array();
$price_b8_1 = array();
$price_b8_2 = array();
foreach($file2 as $lines2){
	if($lines2[0]=== null)continue;
	//	var_dump($lines2);

	if($lines2[0] ==="6月"){
		//var_dump($value2[0]);
		if($lines2[1]==="A"){
			$price_a6_1[] = $lines2[2];
			$price_a6_2[] = $lines2[3];

		}else{
			$price_b6_1[] = $lines2[2];
			$price_b6_2[] = $lines2[3];
		}

	}elseif($lines2[0]==="7月"){

		if($lines2[1] ==="A"){
			$price_a7_1[] = $lines2[2];
			$price_a7_2[] = $lines2[3];
		}else{
			$price_b7_1[] = $lines2[2];
			$price_b7_2[] = $lines2[3];
		}
	}else{
		if($lines2[1] ==="A"){
			$price_a8_1[] = $lines2[2];
			$price_a8_2[] = $lines2[3];
		}else{
			$price_b8_1[] = $lines2[2];
			$price_b8_2[] = $lines2[3];
		}
	}
}
$price_a6_1 = array_sum($price_a6_1);
$price_a6_2 = array_sum($price_a6_2);
$price_b6_1 = array_sum($price_b6_1);
$price_b6_2 = array_sum($price_b6_2);
$price_a7_1 = array_sum($price_a7_1);
$price_a7_2 = array_sum($price_a7_2);
$price_b7_1 = array_sum($price_b7_1);
$price_b7_2 = array_sum($price_b7_2);
$price_a8_1 = array_sum($price_a8_1);
$price_a8_2 = array_sum($price_a8_2);
$price_b8_1 = array_sum($price_b8_1);
$price_b8_2 = array_sum($price_b8_2);


echo'<tr>';
echo '<td rowspan="2">6月</td>';
echo '<td>A</td>';
echo '<td>'.$price_a6_1.'</td>';
echo '<td>'.$price_a6_2.'</td>';
echo '</tr>';
echo'<tr>';
echo '<td>B</td>';
echo '<td>'.$price_b6_1.'</td>';
echo '<td>'.$price_b6_2.'</td>';
echo "</tr>";
echo'<tr>';
echo '<td rowspan="2">7月</td>';
echo '<td>A</td>';
echo '<td>'.$price_a7_1.'</td>';
echo '<td>'.$price_a7_2.'</td>';
echo '</tr>';
echo'<tr>';
echo '<td>B</td>';
echo '<td>'.$price_b7_1.'</td>';
echo '<td>'.$price_b7_2.'</td>';
echo "</tr>";
echo'<tr>';
echo '<td rowspan="2">8月</td>';
echo '<td>A</td>';
echo '<td>'.$price_a8_1.'</td>';
echo '<td>'.$price_a8_2.'</td>';
echo '</tr>';
echo'<tr>';
echo '<td>B</td>';
echo '<td>'.$price_b8_1.'</td>';
echo '<td>'.$price_b8_2.'</td>';
echo "</tr>";

echo "</table>";


//2-1
$zip1 = 433;
$zip2 = 8444;


if(preg_match('/^\d{3}$/',$zip1) ===1  && preg_match('/^\d{4}$/',$zip2) ===1)
{
	echo "OK<br/>";
}else{
	echo "NG<br/>";

}
$tel1 =1234 ;
$tel2 =5678444444444444;
$tel3 =23 ;



if(preg_match('/^[0-9]{1,6}$/',$tel1) === 1  && preg_match('/^[0-9]{1,6}$/',$tel2) ===1 && preg_match('/^[0-9]{1,6}$/',$tel3) ===1)
{
	$count_moji = $tel1.$tel2.$tel3; 
	if(preg_match('/^[0-9]{1,11}$/',$count_moji) === 1){
		echo "OK<br>";


	}else{

		echo "NG<br>";
	}
}else{
	echo "NG<br>";


}
//2-2
$mail = "mail@mailcojp";



if(preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/', $mail)=== 1 ){

	echo "問題ありません<br><br>";
}else{


	echo "正しいメールアドレスをいれてください<br><br>";
}


//3-1
//3-2
$err_msg1='';
$err_msg2='';
$err_msg3='';
$err_msg4='';
$err_msg5='';
$err_msg6='';
$err_msg7='';

$family_name = (isset($_POST['family_name'])=== true)?$_POST['family_name']:'';
$first_name = (isset($_POST['first_name'])=== true)?$_POST['first_name']:'';
$age        = (isset($_POST['age'])=== true)?$_POST['age']:'';
$zip        = (isset($_POST['zip'])=== true)?$_POST['zip']:'';
$addres     = (isset($_POST['addres'])=== true)?$_POST['addres']:'';
$id     = (isset($_POST['id'])=== true)?$_POST['id']:'';
$pw     = (isset($_POST['pw'])=== true)?$_POST['pw']:'';

//PHP5.3以降はこんな書き方もある↓(配列はダメ!変数のみ)
//$a = 10;
//$c = $a ?:5;//$c = $a ? $a:5;と同じ
//echo $c;


//投稿がある場合のみ処理を行う
if(isset($_POST["send"]) === true){
	if($family_name ==='')$err_msg1 = '氏を入力してください';
	if($first_name ==='')$err_msg2 = '名を入力してください';
	if($age        ===''){
		$err_msg3 = '年齢を入力してください';
	}elseif(preg_match('/^[0-9]+$/',$age) ===0){
		$err_msg3 = '年齢を正しく入力してください';
	}

	if($zip        ===''){
		$err_msg4 = '郵便番号を入力してください';
	}elseif(preg_match('/^[0-9]{7}$/',$zip)===0){
		$err_msg4 = '郵便番号を正しく入力してください';

	}
	if($addres     ==='')$err_msg5 = '住所を入力してください';
	//if($age<20) $err_msg3 = '20未満の方は参加できません';
	$tmp_image = $_FILES['image'];
	//var_dump($tmp_image);
	//エラーがなく、サイズが0ではないか
	if($tmp_image['error'] === 0 && $tmp_image['size'] !==0 ){
		//正しくサーバーにアップされているかどうか
		if(is_uploaded_file($tmp_image['tmp_name']) === true){
			//正しくサーバーにアップされているかどうか
			$image_info = getimagesize($tmp_image['tmp_name']);
			//var_dump($image_info);
			$image_mime = $image_info['mime'];

			//画像サイズが利用できるサイズ以内かどうか
			if($tmp_image['size'] > 1048576){
				echo "アップロードできる画像のサイズは、1MBまでです<br><br>";

				//画像の形式が利用できるタイプかどうか
			}else if(preg_match('/^image\/jpeg$/', $image_mime) ===0 )
			{
				echo "アップロードできる画像の形式は、JPEG形式だけです<br><br>";
				//time:現在時刻をUnixエポック(1970年1月1日00:00:00GMT)からの通算秒として返す(Unixタイムスタンプ)
			}else if (move_uploaded_file($tmp_image['tmp_name'] , './upload_' . time() . '.jpg')=== true){
				echo "画像のアップロードが完了しました<br><br>";
			}
		}
	}

	//if($family_name !==''&& $first_name !=='')
	if($err_msg1 ==='' && $err_msg2 ===''&& $err_msg3 ===''&& $err_msg4===''&& $err_msg5==='')
	{
		$text = $family_name ."\t". $first_name ."\t". $age ."\t". $zip ."\t". $addres ."\n";
		if(is_file("moji.txt") ===false ) file_put_contents("moji.txt", 氏."\t".名."\t".年齢."\t".郵便番号."\t".住所."\n");
		file_put_contents("moji.txt",$text, FILE_APPEND);
		echo "保存されたデータは<br>";
		echo "氏\t名\t年齢\t郵便番号\t住所<br>";
		echo $text. "<br>";



		echo "mail send !<br>";
		exit("this task stop!");

	}
}






//4
if(isset($_POST["send2"]) === true)
{
	$salt = 'abcde12345abcde12345zz';
	$cost = 12;
	$hash = crypt( $password_text, '$2y$' . $cost . '$' . $salt . '$');
	$conf1 = crypt( $true_password, '$2y$' . $cost . '$' . $salt . '$');
	$conf2 = crypt( $false_password, '$2y$' . $cost . '$' . $salt . '$');
	if($id ==='')$err_msg6 = 'IDを入力してください';
	if($pw ==='')$err_msg7 = 'PWを入力してください';
	//if($family_name !==''&& $first_name !=='')
	if($err_msg6==='')
	{
		$idpw =file_get_contents("login.txt");
		$idpw = explode(',',$idpw);
		$i =0;
		$id_check = $idpw[0];
		$pw_check = $idpw[1];
		//var_dump($id_check);
		//var_dump($pw_check);
		//var_dump($id);
		//var_dump($pw);
		$hash = crypt( $pw_check, '$2y$' . $cost . '$' . $salt . '$');
		$conf1 = crypt( $pw, '$2y$' . $cost . '$' . $salt . '$');
		if($id === $id_check and $hash === $conf1)
		{
			$loginmsg = "OK";
		}else{

			$loginmsg = "ログイン情報が間違っています";
		}


	}
}


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta chrset="Utf-8">
 <title>お問い合わせフォーム</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
氏:<input type="text" name="family_name" value="<?PHP echo $family_name;?>"/>

<?php echo $err_msg1; ?><br/>
名:<input type="text" name="first_name" value="<?php echo $first_name;?>"/>

<?PHP echo $err_msg2;?><br>

年齢:<input type="text" name="age" value="<?PHP echo $age;?>"/>

<?PHP echo $err_msg3;?><br>
郵便番号:<input type="text" name="zip" value="<?PHP echo $zip;?>"/>


<?PHP echo $err_msg4;?><br>
住所:<input type="text" name="addres" value="<?PHP echo $addres;?>"/>



<?PHP echo $err_msg5;?><br>
画像:<input type="file" name="image"/>
<br>

備考:<input type="text" name="bikou" value=""/>

<br>


<input type="submit" name="send" value="クリック"/>
</form>
<br><br>

<?php echo $loginmsg; ?><br/>
<form method="post" action="">
ID:<input type="text" name="id" value="<?PHP echo $id;?>"/>

<?php echo $err_msg6; ?><br/>
PW:<input type="password" name="pw" value=""/>
<?php echo $err_msg7; ?><br/>
<br>

<input type="submit" name="send2" value="クリック"/>
</form>
</body>
</html>
