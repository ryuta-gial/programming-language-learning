<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <title>javascript</title>
<script type="text/javascript" src="sample.js"></script>
<script type="text/javascript">
/*
function button_click()
{
	alert('クリック');
}

function button_check()
{
	name = document.getElmentByld('name_id').value;
	if(name === ''){
	alert('名前が入力されていません');
}else{
document.getElmentByld('write').innerHTML = name;
	alert('入力された名前は' + name + 'です');

}
}

*/
</script>
</head>
<body>
<form method="post" action="">
名前:<input id="name_id" type="text" name="name" value=""/></br>
<input type="button" name="click" value="クリック" onclick="button_click();" /><br />
<input type="button" name="check" value="チェック" onclick="button_check();" /><br />
</form>
<div id="write"></div>
</body>
</html>




