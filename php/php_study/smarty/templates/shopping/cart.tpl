<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="http://localhost:8888/test/kanri/smarty/css/shopping.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="cart_list">
<p>ショッピングカート</p>
<p><a href="http://localhost:8888/test/kanri/smarty/shopping/list.php">商品一覧へ戻る</a></p>
<p>カート内商品数：{$sumNum}個 合計金額:&yen;{$sumPrice|number_format:0}</p>
{if count($dataArr) === 0}
<p>カートに商品は入っていません</p>
{else}
{foreach from=$dataArr item=value}
<div class="item">
<ul>
<li class="image">
<img src="images/{$value.image}" alt="{$value.item_name}"/></li>
<li class="name">{$value.item_name}</li>
<li class="price">&yen;{$value.price|number_format:0}</li>
<li><a href="http://localhost:8888/test/kanri/smarty/shopping/cart.php?crt_id={$value.crt_id}">削除</a></li>
</ul>
</div>
{/foreach}
{/if}
</div>
</div>
</body>
</html>
