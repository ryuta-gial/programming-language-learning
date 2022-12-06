<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>小テスト5日目</title>
</head>

<body>
<script type="text/javascript">
function check(){

	var flag = 0;


	// 設定開始（必須にする項目を設定してください）

	if(document.form1.name.value == ""){
		document.getElementById('name').style.backgroundColor = '#F0F';
		flag = 1;

	}
	if(document.form1.age.value == ""){ 
	document.getElementById('age').style.backgroundColor = '#F0F';
	flag = 1;

	}

	if(flag){

		window.alert('必須項目に未入力がありました'); 
		return false; // 送信を中止

	}
	else{

		return true; // 送信を実行

	}

}


</script>

<form method="post" action=""enctype="multipart/form-data" name="form1" onSubmit="return check()">
{if $msg1 !== ''}<p>{$err_msg1}</p>{/if}
名前:<input type="text" id="name" name="name" value=""{if $msg1 !== ''}style.background='yellow';{/if}/>

{if $msg2 !== ''}<p>{$err_msg2}</p>{/if}
年齢:<input type="text" id="age" name="age" value=""/>
<br>
画像:<input type="file" name="image"/>
<br>

<input type="radio" name="sex" value="men" checked> 男性
<input type="radio" name="sex" value="girl" > 女性



{if $msg3 !== ''}<p>{$err_msg3}</p>{/if}
{if $msg4 !== ''}<p>{$err_msg4}</p>{/if}
<select name='language'>
<option value=''selected></option>
<option value'C/C++'>C/C++</option>
<option value='PHP' >PHP</option>
<option value='Perl'>Perl</option>
<option value='Rudy'>Rudy</option>
</select>

<br>
<input type="submit" name="send" value="クリック"　onclick ="chksubmit(oj)"/>
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
