<?PHP
//送信ボタン押されているかどうか
if(isset($_POST['send'])=== true){
	$tmp_image = $_FILES['image'];
	//var_dump($tmp_image);
	//エラーがなく、サイズが0ではないか
	if($tmp_image['error'] === 0 && $tmp_image['size'] !==0 ){
		//正しくサーバーにアップされているかどうか
		if(is_uploaded_file($tmp_image['tmp_name']) === true){
			//正しくサーバーにアップされているかどうか
			$image_info = getimagesize($tmp_image['tmp_name']);
			var_dump($image_info);
			$image_mime = $image_info['mime'];

			//画像サイズが利用できるサイズ以内かどうか
			if($tmp_image['size'] > 1048576){
				echo "アップロードできる画像のサイズは、1MBまでです";

				//画像の形式が利用できるタイプかどうか
			}else if(preg_match('/^image\/jpeg$/', $image_mime) ===0 )
			{
				echo "アップロードできる画像の形式は、JPEG形式だけです";
				//time:現在時刻をUnixエポック(1970年1月1日00:00:00GMT)からの通算秒として返す(Unixタイムスタンプ)
			}else if (move_uploaded_file($tmp_image['tmp_name'] , './upload_' . time() . '.jpg')=== true){
				echo "画像のアップロードが完了しました";
			}
		}
	}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>画像アップロード</title>
</head>
<body><!--ファイルのアップロードにはenctype="multopart/form-data"が必要-->
<form method="post" action="" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit" name="send" value="送信">
</form>
</body>
</html>










