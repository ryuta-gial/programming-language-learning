function button_click()
{
	alert('クリック');

}

function button_check()
{
	//変数を定義 cf.php $name
	var nameElement = document.getElementById('name_id');

	var name = nameElement.value;
	console.log(name);
	if(name === ''){
		alert('名前が入力されていません');	
	}else{
	var writeElement = document.getElementById('write')
	//htmk全体
	writeElement.innerHTML = name;
		alert('入力された名前は'+ name + 'です');
	}

}
