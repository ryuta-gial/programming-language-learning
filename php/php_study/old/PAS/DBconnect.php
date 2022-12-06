<?php
$mysql_con=mysqli_connect('localhost','root','root');
mysqli_set_charset($mysql_con,"utf8");
if($mysql_con==false){
	print"DB_connect eror";
	exit;
}
$select_db=mysqli_select_db($mysql_con,'ryudb');
if($select_db==false){
	print"DB_select eror";
	exit;
}
//$dsn = 'mysql:host=localhost;dbname=ryudb';
//$user = 'root';
//$password = 'hv58nt7k';
//
//
//
//try {
//$pdo = new PDO($dsn,$user);
////print('接続に成功しました。<br>');
//$pdo->query('SET NAMES utf8');
//} catch (PDOException $e) {
// exit('データベース接続失敗。'.$e->getMessage());
//}
?>
