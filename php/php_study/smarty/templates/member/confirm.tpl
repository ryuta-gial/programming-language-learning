<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>会員登録確認</title>
</head>
<body>
<form method="post" action="confirm.php">
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
<td>{if $dataArr.sex === '0'}男性{elseif $dataArr.sex ==='1'}女性{/if}
</td>
</tr>
<tr>
<th>生年月日</th>
<td>{$dataArr.year}年{$dataArr.month}月 {$dataArr.day}日</td>
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
<td>{foreach from=$dataArr.traffic key=key item=value}{$trafficArr[$value]}{/foreach}</td>
</tr>
<tr>
<th>備考</th>
<td>{$dataArr.contents}</td>
</tr>
</table>
<div>
<input type="submit" name="back" value="戻る"/>
<input type="submit" name="complete" value="登録完了"/>
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



