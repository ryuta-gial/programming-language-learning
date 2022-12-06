<?
$db_host ='localhost';
$db_name ='board_db';
$db_user ='board_user';
$db_pass ='board_pass';

//データベースホストへ接続する
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($link !== false){
	
	$query = "SELECT id, name, contents FROM board";
	$res = mysqli_query($link, $query);

	$data = array();
	//結果を配列に格納する
	while($row = mysqli_fetch_assoc($res)){
	//lineArray3[] = $lineArray2;
	$data[] = $row;
	//array_push($resArr,$row);
	//下記は上記と同じ動作
	}
	arsort($data);
	//arsort:降順(逆順)で表示
}else{
	echo "データベースの接続に失敗しました";
}
	//データベースへの接続を閉じる
	mysqli_close($link);
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
<textarea name="contents" rows="4" cols="20"></textarea>
<input type="submit" name="send" value="書き込む"/>
</form>
<!--ここに、書き込まれたデータを表示する-->

<?php
echo "id : name: contents<br>";
foreach($data as $val)
{
	echo $val['id']. $val['name'] .' '. $val['contents'] . '<br/>';

}
?>

</body>
</html>

