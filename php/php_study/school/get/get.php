<?php

var_dump($_GET);
//$_GET:スーパーグローバル変数(定義済み変数)の一つ。連想配列として使用する。


$data = array("渡辺","佐藤","田中");

$id = (isset($_GET["id"]) === true ) ? $_GET["id"] : "";

if($id !=="") echo $data[$id];

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <title>GETテスト</title>
</head>
<body>
<p><a href="http://localhost/school/get/get.php?id=0">クリックすると渡辺さんが表示されます。</a></p>

<p><a href="http://localhost/school/get/get.php?id=1">クリックすると佐藤さんが表示されます。</a></p>
<p><a href="http://localhost/school/get/get.php?id=2">クリックすると田中さんが表示されます。</a></p>
</body>
</html>

