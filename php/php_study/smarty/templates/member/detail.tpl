<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>会員登録確認</title>
</head>
<body>
<form method="post" action="list.php">
<table>
<tr>
<th>お名前(氏名)</th>
<td>{$dataArr.family_name} {$dataArr.first_name}</td>
</tr>
<tr>
<th>お名前(かな)</th>
<td>{$dataArr.family_name_kana}{$dataArr.first_name_kana}</td>
</tr>
<tr>
<th>性別</th>
<td>{if $dataArr.sex ==='0'}男性{elseif $dataArr.sex ==='1'}女性{/if}
</td>
</tr>
<tr>
<th>生年月日</th>
<td>{$dataArr.year}年 {$dataArr.month}月 {$dataArr.day}日
</td>
</tr>
<tr>
<th>郵便番号</th>
<td>{$dataArr.zip1} - {$dataArr.zip2}</td>
</tr>
<tr>
<th>住所</th>
<td>{$dataArr.address}</td>
</tr>
<tr>
<th>メールアドレス</th>
<td>{$dataArr.email}</td>
</tr>
<tr>
<th>電話番号</th>
<td>{$dataArr.tel1}-{$dataArr.tel2}-{$dataArr.tel3}</td>
</tr>
<tr>
<th>交通手段</th>
<td>
{if "0"|in_array:$dataArr.traffic}徒歩{/if}
{if "1"|in_array:$dataArr.traffic}自転車{/if}
{if "2"|in_array:$dataArr.traffic}バス{/if}
{if "3"|in_array:$dataArr.traffic}電車{/if}
{if "4"|in_array:$dataArr.traffic}車・バイク{/if}
</td>
</tr>
<tr>
<th>備考</th>
<td>{$dataArr.contents}</td>
</tr>
</table>
<div>
<input type="submit" name="back" value="一覧へ戻る"/>
</div>
</form>
</body>
</html>
