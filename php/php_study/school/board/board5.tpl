<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>掲示板_DB_Smarty版</title>
</head>
<body>
<form method="post" action="">
<table>
<tr>
<th>名前</th>
<td><input type="text" name="name" value=""/></td>
</tr>
<tr>
<th>コメント</th>
<td><textarea name="contents" rows="4" cols="20"></textarea></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="send" value="書き込む"/></td>
</tr>
</table>
</form>
{if $msg !== ''}<p>{$msg}</p>{/if}
{if $err_msg !== ''}<p style="color:#f00;">{$err_msg}</p>{/if}

<table>
<tr>
<th>&nbsp;</th>
<th>名前</th>
<th>コメント</th>
</tr>
{*phpで書くとこんな感じ→foreach($data as $key=>$value) *}
{foreach from=$data key=key item=value}
<tr>
<td>{$value. id}</td>
<td>{$value.name|htmlspecialchars}</td>
<td>{'/\n/'|preg_replace:'<br/>':$value.contents}</td>
</tr>
{/foreach}
</table>
</body>
</html>
