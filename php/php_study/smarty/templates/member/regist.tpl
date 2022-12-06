<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script language="javaScript" type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
<script language="javaScript" type="text/javascript" src="/js/common.js"></script>
<link href = "/css/style.css" rel="stylesheet" type="text/css" />
<title>会員登録</title>
</head>
<body>
<form method="post" action="confirm.php">
<table>
<tr>
<th>お名前(氏名)<span class ="red">*</span></th>
<td>
<input type="text" name="family_name" value="{$dataArr.family_name}"/>
<input type="text" name="first_name" value="{$dataArr.first_name}"/>
{if $errArr.family_name !== ''}<br/><span class="red">{$errArr.family_name}</span>{/if}
{if $errArr.first_name !== ' ' }<br/><span class="red">{$errArr.first_name}</span>{/if}
</td>
</tr>
<tr>
<th>お名前(かな)</th>
<td>
<input type="text" name="family_name_kana" value="{$dataArr.family_name_kana}" />
<input type="text" name="first_name_kana" value="{$dataArr.first_name_kana}" />
</td>
</tr>
<tr>
<th>性別<span class="red">*</span></th>
<td>
{html_radios name="sex" options=$sexArr  selected=$selectSex }
{if $errArr.sex !=''}<br /><span class="red">{$errArr.sex}</span>{/if}
</td>
</tr>
<tr>
<th>生年月日<span class="red">*</span></th>
<td>
<select name="year">
{html_options options=$yearArr selected=$selectYear }
</select>
<select name="month">
{html_options options=$monthArr selected=$selectMonth }
</select>
<select name="day">
{html_options options=$dayArr selected=$selectDay }
</select>

{if $errArr.year !==''}<br/><span class="red">{$errArr.year}</span>{/if}
{if $errArr.month !==''}<br/><span class="red">{$errArr.month}</span>{/if}
{if $errArr.day !==''}<br/><span class="red">{$errArr.day}</span>{/if}
</td>
</tr>
<tr>
<th>郵便番号<span class="red">*</span></th>
<td>
<input type="text" name="zip1" value="{$dataArr.zip1}" id="zip1" size="3" maxlength="3"/>-
<input type="text" name="zip2" value="{$dataArr.zip2}" id="zip2" size="4" maxlength="4"/>
<input type="button" name="address_search" value="〒から住所を入力" id="address_search" />
{if $errArr.zip1 !==''} <br /> <span class="red"> {$errArr.zip1}</span>{/if}
{if $errArr.zip2 !==''}<br/><span class="red">{$errArr.zip2}</span>{/if}
</td>
</tr>
<tr>
<th>住所<span class="red">*</span></th>
<td>
<input type="text" name="address" value="{$dataArr.address}" id="address" size="40"/>
{if $errArr.address !==''}<br/><span class="red">{$errArr.address}</span>{/if}
</td>
</tr>
<tr>
<th>メールアドレス<span class="red">*</span></th>
<td>
<input type="text" name="email" value="{$dataArr.email}"  size="40"/>
{if $errArr.email !==''}<br/><span class="red">{$errArr.email}</span>{/if}
</td>
</tr>
<tr>
<th>電話番号<span class="red">*</span></th>
<td>
<input type="text" name="tel1" value="{$dataArr.tel1}"  size="6" maxlength="6"/>-
<input type="text" name="tel2" value="{$dataArr.tel2}"  size="6" maxlength="6"/>-
<input type="text" name="tel3" value="{$dataArr.tel3}"  size="6" maxlength="6"/>
{if $errArr.tel1 !==''}<br/><span class="red">{$errArr.tel1}</span>{/if}
{if $errArr.tel2 !==''}<br/><span class="red">{$errArr.tel2}</span>{/if}
{if $errArr.tel3 !==''}<br/><span class="red">{$errArr.tel3}</span>{/if}
</td>
</tr>
<tr>
<th>交通手段<span class="red">*</span></th>
<td>
{html_checkboxes name=traffic  options=$trafficArr checked=$selectTraffic }
{if $errArr.traffic !==''}<br/><span class="red">{$errArr.traffic}</span>{/if}
</td>
</tr>
<tr>
<th>備考</th>
<td><textarea name="contents" rows="4" cols="40">{$dataArr.contents}</textarea></td>
</tr>
</table>
<div>
<input type="submit" name="confirm" value="登録確認"/></div>
</form>
</body>
</html>
