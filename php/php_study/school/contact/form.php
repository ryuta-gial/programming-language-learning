<?PHP
//変数の宣言(空を入れる):最初に変数を定義しておかないとエラーになる
$err_msg1 ='';
$err_msg2 ='';

//投稿がある場合は投稿されたデータをそうでなければ空白で定義する(三項演算子を使う)
//定義しておかないとエラーになる
//下記の三項演算子はifで以下のように書ける
//if(isset$_POST['family_name']) === true)
//{
//	$family_name = $_POST['family_name'];
//}
//else
//{
//	$family_name ='';
//
//}
//
//三項演算子
//値 =(条件式)?trueの時の値:falseの値
//$age = 30;
//$message = ($age >=20)?'大人です':'子供です'



//issetの判定方法
//$x ="";
//
//var_dump(isset($x));
//var_dump(isset($y));

$family_name = (isset($_POST['family_name'])=== true)?
	$_POST['family_name']:'';
$first_name = (isset($_POST['first_name'])=== true)?
	$_POST['first_name']:'';

//PHP5.3以降はこんな書き方もある↓(配列はダメ!変数のみ)
//$a = 10;
//$c = $a ?:5;//$c = $a ? $a:5;と同じ
//echo $c;


//投稿がある場合のみ処理を行う
if(isset($_POST["send"]) === true){
	if($family_name ==='')$err_msg1 = '氏を入力してください';
	if($first_name ==='')$err_msg2 = '名を入力してください';
	//if($age<20) $err_msg3 = '20未満の方は参加できません';

	//if($family_name !==''&& $first_name !=='')
	if($err_msg1 ==='' && $err_msg2 ===''/*&& $err_msg3 ===''*/)
{
	echo "mail send !<br>";
	exit("this task stop!");

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
<form method="post" action="" >
氏：<input type="text" name="family_name" value="<?PHP echo $family_name;?>"/>

<?php echo $err_msg1; ?><br/>
名:<input type="text" name="first_name" value="<?php echo $first_name;?>"/>

<?PHP echo $err_msg2;?><br>
<input type="submit" name="send" value="クリック"/>
</form>

</body>
</html>
