<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="http://localhost:8888/test/kanri/smarty/css/shopping.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
{include file="category_menu.tpl"}
<div id="item_list">
{foreach from=$dataArr item=value}
<div class="item">
<ul>
<li class="name">
<a href="/test/kanri/smarty/shopping/detail.php?item_id={$value.item_id}">{$value.item_name}</a></li>
<li class="price">&yen;{$value.price|number_format:0}</li>
<li class="image"><a href="/test/kanri/smarty/shopping/detail.php?item_id={$value.item_id}"><img src="images/{$value.image}" alt="{$value.item_name}"/></a></li>
<li class="detail"><a href="/test/kanri/smarty/shopping/detail.php?item_id={$value.item_id}">詳細</a></li>
</ul>
</div>
{/foreach}
</div>
</div>
</body>
</html>
