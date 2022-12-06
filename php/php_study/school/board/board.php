<?PHP
$data ='';
//ファイルポインタを開く、ファイルと読み込みか書き込みか
//引数(「〇〇して欲しい」という依頼)はファイルとモード
$fp = fopen('data.txt','r');
//一行ずつファイルを読み込む。
//読み込むが終わるまでループを繰り返す
$flg = true;
$count =0;
while($flg ===true){
	$res = fgets($fp);
	if($res === false) $flg = false;
	//$data = $data(今までの書き込み全て) +$res
	//$a.$b 結合
	$data .=$res;
	$count++;
	if($count % 2 === 0) $data  .="<br>";
}
//しおりをしまう
fclose($fp);
//よりスマートな書き方はこれ↓
//while($res = fgets($fp)){
//$data. =$res."<br>";
//}
if(isset($_POST['send']) === true){
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	if($name !== '' && $comment !==''){
		//追加書き(追記/後ろに書き込み)の場合モードはa,新規の上書きはw
		$fp = fopen('data.txt','a');
		//LOCK_EX:排他的ロック,LOCK_UN:ロック解除
		if(flock($fp,LOCK_EX)===true) {
			fwrite($fp,$name . "\n ". $comment . "\n");
			flock($fp,LOCK_UN);
		}
		fclose($fp);
	}else{
		echo "名前、またはコメントが記入されていません";
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>掲示板</title>
</head>
<body>
<form method="post" action="">
名前
<input type="text" name="name" value=""/>
コメント
<textarea name="comment" rows="8" cols="30"></textarea>
<input type="submit" name="send" value="書き込む">
</form>
<!--ここに、書き込まれたデータを表示する-->

<?PHP echo $data ;?>
</body>
</html>
