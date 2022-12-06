<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script language="Javascript" type="text/javascript" src="http://localhost:8888/test/kanri/smarty/js/shopping.js"></script>
<link href="http://localhost:8888/test/kanri/smarty/css/shopping.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
{include file="category_menu.tpl"}
<div id="item_detail">
<div class="image">
<img src="images/{$itemData.image}" alt="{$itemData.item_name}" />
</div>
<div class="detail">
<dl>
<dt>商品名</dt><dd>{$itemData.item_name}</dd>
<dt>詳細</dt><dd>{$itemData.detail}</dd>
<dt>価格</dt>
<dd>&yen;{$itemData.price|number_format:0}</dd>
</dl>
</div>
<div class="cart_in">
<input type="button" name="back" value="一覧へ戻る" onclick="history.back(); return false;" />
<input type="button" name="cart" value="ショッピングカートへ入れる" onclick="cart_in('{$itemData.item_id}');"/>
</div>
</div>
</div>
</body>
</html>
