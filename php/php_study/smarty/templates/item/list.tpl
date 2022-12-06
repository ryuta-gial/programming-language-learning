<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>商品一覧</title>
</head>
<body>
<table border="1">
<tr>
<th>ID</th>
<th>商品</th>
<th>価格</th>
<th>画像</th>
<th>編集</th>
</tr>
{foreach from=$dataArr item=value}
<tr>
<td>
<a href="/item/detail.php?item_id={$value.item_id}">{$value.item_id}</a>
</td>
<td>
{$value.item_name}
</td>
<td>{$value.price}</td>
<td>{if $value.pic}<img src={$value.pic}>{/if}
</td>
<td><a href="./update.php?item_id={$value.item_id}">編集</a></td>
</tr>{/foreach}
</table>
<a href="http://localhost:8888/test/kanri/smarty/item/regist.php">商品入力へ戻る</a>
</body>
</html>