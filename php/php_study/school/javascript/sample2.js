$(function(){
	$('#click_id').click(function(){
		alert('クリック');
	});
	$('#check_id').click(function(){
		//#name_idという部品の値をとってくる
		var name = $('#name_id').val();

		if(name === ''){
			alert('名前が入力されていません');
		}else{
			$('#write').html(name);
			alert('入力された名前は' + name + 'です');
		}
		});
	
	$("#area").hover(
		function(){
			$("#area").css("background-color","#808080");
		},
		function(){
			$("#area").css("background-color","#46f2d2");
		}
	
	);
	
	});
