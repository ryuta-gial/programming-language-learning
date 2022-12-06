$(function(){
	$(' #address_search').click(function(){
		var zip1 = $('#zip1').val();
		var zip2 = $('#zip2').val();
		
		if(zip1.match(/[0-9]{3}/) === null || zip2.match(/[0-9]{4}/) === null)
		{
		 alert('正確な郵便番号を入力してください。');
		 return false ; //ページ遷移をしない
		}else{
			$.ajax({
				type : "get" ,
				url    :"/member/postcode_search.php?zip1=" +
				escape(zip1) + "&zip2=" + escape(zip2) ,
				//URLのプログラムでechoされたものがdata
				//通信成功 : done、通信失敗 : fall
				success : function(data){
					if(data == 'no' || data ==''){
						alert('該当する郵便番号がありません');
					}else{
						$('#address').val(data);
					}
				}
				});
		}
		});
});		