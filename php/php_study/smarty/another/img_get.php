<?php
$db_host ='localhost';
$db_name ='person_db';
$db_user ='root';
$db_pass ='root';

/*
CREATE TABLE t_person_tb (
  id int not null auto_increment primary key ,
  name varchar(20) not null,
  age int(11) not null ,
  image blob NOT NULL,
  sex varchar(20) not null ,
  language varchar(20) not null
);

*/

//データベースへ接続する
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// 画像データ取得
$sql = "SELECT image FROM t_person_tb WHERE ID = ' " . $_GET['id']."'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
// 画像ヘッダとしてjpegを指定（取得データがjpegの場合）
header("Content-Type: image/jpeg");
// バイナリデータを直接表示
echo $row['image'];
?>