<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>商品登録確認</title>
</head>
<body>
<form method="post" action="confirm.php?item_id={$dataArr.item_id}"/>
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
<td>{$dataArr.pic}</td>
</tr>

</table>
<div>
<input type="submit" name="back" value="戻る"/>
<input type="submit" name="up_complete" value="更新登録完了"/>
{foreach from=$dataArr item=value key=key}
{if is_array( $value)}
{foreach from= $value item=v }
<input type="hidden" name="{$key}[]" value="{$v}"/>
{/foreach}
{else}
<input type="hidden" name="{$key}" value="{$value}" />
{/if}
{/foreach}
</div>
</form>
</body>
</html>



