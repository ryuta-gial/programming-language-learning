<?php
$dsn = 'mysql:host=localhost;dbname=ryudb';
$user = 'root';
$password = 'root';

try {
$pdo = new PDO($dsn,$user);
//print('接続に成功しました。<br>');
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}
?>
