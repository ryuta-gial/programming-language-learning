<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>会員一覧</title>
</head>
<body>
<table border="1">
<tr>
<th>ID</th>
<th>お名前</th>
<th>メール</th>
<th>性別</th>
<th>登録日時</th>
<th>編集リンク</th>
</tr>
{foreach from=$dataArr item=value}
<tr>
<td>
<a href="/test/kanri/smarty/member/detail.php?mem_id={$value.mem_id}">{$value.mem_id}</a></td>
<td>
<span style="font-size:60%;"> {$value.family_name_kana}{$value.first_name_kana}</span></br>
{$value.family_name} {$value.first_name}
</td>
<td>{$value.email}</td>
<td>{if $value.sex ==='0'}男性{elseif $value.sex === '1' }女性{/if}</td>
<td>{$value.regist_date}</td>
<td><a href="./update.php?mem_id={$value.mem_id}">編集</a></td>
</tr>{/foreach}
</table>
</body>
</html>