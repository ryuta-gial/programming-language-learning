<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script language="javaScript" type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
<script language="javaScript" type="text/javascript" src="/js/common.js"></script>
<link href = "/css/style.css" rel="stylesheet" type="text/css" />
<title>商品登録</title>
</head>
<body>
<form method="post" action="confirm.php" enctype="multipart/form-data">
<table>
<tr>
<th>商品名<span class ="red">*</span></th>
<td>
<input type="text" name="item_name" value="{$dataArr.item_name}"/>
{if $errArr.item_name !== ' ' }<br/><span class="red">{$errArr.item_name}</span>{/if}
</td>
</tr>
<tr>
<th>価格<span class ="red">*</span></th>
<td>
<input type="text" name="price" value="{$dataArr.price}" />
{if $errArr.price !== ' ' }<br/><span class="red">{$errArr.price}</span>{/if}
</td>
</tr>
<tr>
<th>画像<span></span></th>
<td>
<input type="file" name="pic" value=""/>
</td>
</tr>
</table>
<div>
<input type="submit" name="confirm" value="登録確認"/></div>
</form>
<a href="http://localhost:8888/test/kanri/smarty/item/list.php">商品一覧へ行く</a>
</body>
</html>
