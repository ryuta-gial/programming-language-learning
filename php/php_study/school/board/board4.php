<?php

$db_host ='localhost';
$db_name ='board_db';
$db_user ='board_user';
$db_pass ='board_pass';


//データベースへ接続する
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link !== false){

	$msg ='';
	$err_msg ='';

	if(isset($_POST['send']) ===true){
	
		$name = $_POST['name'] ;
		$contents =$_POST['contents'];

		if($name !=='' && $contents !==''){
		//!== '' 空(カラ)ではない
		
		
			//$query ="INSERT INTO board(name, contents) VALUES("." mysqli_real_escape_string($name ・・・
			//改行を入れる時は.(ドット)でつなぐ
			//$var = "a"."b"
			//$var = "a"
			//      ."b"
		
			$query = " INSERT INTO board("
				." name  ,"
				." contents "
				.")VALUES("
				."'".mysqli_real_escape_string($link, $name) ."',"
				."'".mysqli_real_escape_string($link, $contents) ."'"
				.")";
			$res = mysqli_query($link, $query);
			//↑$res = mysqli_query("insert int ・・・");
			//mysqli_query クエリを実行する
			
			if($res !== false){
			$msg ='書き込みに成功しました';
			}else{
				$err_msg ='書き込みに失敗しました';
			}

		}else{
			$err_msg ='名前とコメントを記入してください';
		}
		}
	$query = "SELECT id, name, contents FROM board";
	$res   = mysqli_query($link,$query);
	$data = array();
	while($row = mysqli_fetch_assoc($res)){
		array_push($data, $row);
	}

	arsort($data);
	//arsort 降順(逆順)で表示
}else{
	echo "データベースの接続に失敗しました";
}
//データベースへの接続を閉じる
mysqli_close($link);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<form method="post" action="">
名前<input type="text" name="name" value=""/>
コメント<textarea name="contents" rows="4" cols="20"></textarea>
<input type="submit" name="send" value="書き込む">
</form>
<!--ここに、書き込まれたデータを表示する-->
<?php
if($msg !=='') echo'<p>'.$msg. '<p>';
if($err_msg !=='')echo '<p style="cplor:#f00;">' .$err_msg. '</p>';
foreach($data as $key => $val)
{
	echo $val['name'] .'　'. $val['contents'] . '<br/>';
}
?>
</body>
</html>

