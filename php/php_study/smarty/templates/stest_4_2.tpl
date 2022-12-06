<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>小テスト4日目</title>
</head>
<body>
<form method="post" action=""enctype="multipart/form-data">
{if $msg1 !== ''}<p>{$err_msg1}</p>{/if}
名前:<input type="text" name="name" value=""/>

{if $msg2 !== ''}<p>{$err_msg2}</p>{/if}
年齢:<input type="text" name="age" value=""/>
<br>
画像:<input type="file" name="image"/>
<br>

<input type="radio" name="sex" value="men" checked> 男性
<input type="radio" name="sex" value="girl" > 女性



{if $msg3 !== ''}<p>{$err_msg3}</p>{/if}
<select name='language'>
<option value=''selected></option>
<option value'C/C++'>C/C++</option>
<option value='PHP' >PHP</option>
<option value='Perl'>Perl</option>
<option value='Rudy'>Rudy</option>
</select>

<br>
<input type="submit" name="send" value="クリック"/>
</form>

<table>
<tr>
<th>&nbsp;</th>
<th>名前</th>
<th>年齢</th>
<th>画像</th>
<th>性別</th>
<th>言語</th>

</tr>
{*phpで書くとこんな感じ→foreach($data as $key=>$value) *}
{foreach from=$data key=key item=value}
<tr>
<td>&nbsp;</td>
<td>{$value.name|htmlspecialchars}</td>
<td>{$value.age}</td>
<td>{if $value.image ==''}　{else} <img src=img_get.php?id={$value.id}>{/if}</td>
<td>{$value.sex}</td>
<td>{$value.language}</td>
</tr>
{/foreach}
</table>

</body>
</html>
