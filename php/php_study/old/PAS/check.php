<?php
session_start();
 // ログイン済みかどうかの変数チェックを行う
if (!isset($_SESSION['userid'])) {

 // 変数に値がセットされていない場合は不正な処理と判断し、ログイン画面へリダイレクトさせる
$no_login_url = "http://ryutest0418.fool.jp/saq/login.php";
 header("Location: {$no_login_url}");
 exit;
 
 } else {
 print "ログイン成功";
 }
 
?>