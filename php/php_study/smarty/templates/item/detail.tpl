<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>商品登録確認</title>
</head>
<body>
<form method="post" action="list.php">
<table>
<tr>
<th>商品名</th>
<td>{$dataArr.item_name}</td>
</tr>
<tr>
<th>価格</th>
<td>{$dataArr.price}</td>
</tr>
<tr>
<th>画像</th>
<td><img src={$dataArr.pic}></td>
</tr>
</table>
<div>
<input type="submit" name="back" value="一覧へ戻る"/>
</div>
</form>
</body>
</html>
