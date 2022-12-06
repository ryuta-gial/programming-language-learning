<?php

require('Smarty.class.php');
require_once('Database.class.php');
require_once('config2.php');

$smarty = new Smarty();
$db     = new Database(DB_HOST , DB_USER , DB_PASS , DB_NAME);
$dbc =$db->connectDB(DB_HOST , DB_USER , DB_PASS , DB_NAME);
	
//テンプレートディレクトリ設定
$smarty->template_dir = '/Applications/XAMPP/xamppfiles/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/XAMPP/xamppfiles/htdocs/smarty/templates_c';

$err_msg1 ='';
$err_msg2 ='';
$err_msg3 ='';
$err_msg4 ='';


if(isset($_POST["send"]) === true){
	$name   = (isset($_POST['name'])=== true)?$_POST['name']:'';
	$age      = (isset($_POST['age'])=== true)?$_POST['age']:'';
	$sex       = (isset($_POST['sex'])=== true)?$_POST['sex']:'';
	$language  = (isset($_POST['language'])=== true)?$_POST['language']:'';
	$tmp_image = $_FILES['image'];
	$check = new check();
	$list = $check->check_post($name,$age,$sex,$language,$tmp_image);
	//var_dump($list);

}





class check
{ 
	public function __construct(){
	}
	public function check_post($cname,$cage,$csex,$clanguage,$ctmp_image){
		$err_msg = array();
		if($cname ==='')$err_msg['name'] = '名前を入力してください';
		if($cage        ===''){
			$err_msg['age'] = '年齢を入力してください';
		}elseif(preg_match('/^[0-9]+$/',$cage) ===0){
			$err_msg['age'] = '年齢を正しく入力してください';
		}elseif($cage<20) {
			$err_msg['age'] = '未成年は入力できません';
		}
		if($csex ==='')$err_msg['sex'] = '性別を入力してください';
		if($clanguage ==='')$err_msg['language'] = '使用言語を入力してください';

		if(isset($err_msg['name']) && isset($err_msg['age']) && isset($err_msg['language']) ){
		}else{

			//エラーがなく、サイズが0ではないか
			if($ctmp_image['error'] === 0 && $ctmp_image['size'] !==0 ){
				//正しくサーバーにアップされているかどうか
				if(is_uploaded_file($ctmp_image['tmp_name']) === true){
					//正しくサーバーにアップされているかどうか
					$image_info = getimagesize($ctmp_image['tmp_name']);
					//画像のMINEタイプ
					$image_mime = $image_info['mime'];
					$upfile = $ctmp_image['tmp_name'];
					$imgdat = file_get_contents($upfile);
					
					$err_msg['pic'] = mysql_real_escape_string($imgdat);
//var_dump($err_msg);
					//画像サイズが利用できるサイズ以内かどうか
					if($ctmp_image['size'] > 1048576){
						$err_msg['iamge'] = "アップロードできる画像のサイズは、1MBまでです<br><br>";
						//画像の形式が利用できるタイプかどうか
					}else if(preg_match('/^image\/jpeg$/', $image_mime) ===0 ){
						$err_msg['image'] = "アップロードできる画像の形式は、JPEG形式だけです<br><br>";
						//time:現在時刻をUnixエポック(1970年1月1日00:00:00GMT)からの通算秒として返す(Unixタイムスタンプ)
					}else if (move_uploaded_file($ctmp_image['tmp_name'] , './upload_' . time() . '.jpg')=== true){
						$err_msg['image'] = "画像のアップロードが完了しました<br><br>";
					}
				}
			}
		}
		return $err_msg;
	}
}
//var_dump($list[pic]);
if($list !=='' ){

	$name = $_POST['name'];
	$age = $_POST['age'];
	$sex = $_POST['sex'];
	$language = $_POST['language'];

	if(isset($list['pic'])=== true){
		$lis = $list['pic'];
	}else{
		$lis = "";
	}
	if($name != '' && $age !== ' '&& $sex !=='' && $language !==''){
		$query = "INSERT INTO t_person_tb("
			." name  ,"
			." age ,"
			." image ,"
			." sex  ,"
			." language  "
			.")VALUES("
			. $db->str_quote($name ).","
			. $db->str_quote($age ).","
			. "'".$lis."',"
			. $db->str_quote($sex ).","
			. $db->str_quote($language)
			.")";
		//var_dump($query);
		$res = $db->execute( $query );
		if($res !== false){
			$msg = '書き込みに成功しました';	
		}else{
			$err_msg = '書き込みに失敗しました';
		}
	}else{
		$err_msg = '名前とコメントを記入してください';
	}
	$query = "SELECT "
		."id,"
		."name,"
		."age,"
		."image,"
		."sex,"
		."language "
		."FROM"
		." t_person_tb";
	//var_dump($query);
	$data = $db->select($query);

	$db->close();
}else{
	echo "値の判定ができてません<br/>";

}
//変数の設定
$smarty->assign('msg', $msg);
$smarty->assign('err_msg1', $list['0']);
$smarty->assign('err_msg2', $list['1']);
$smarty->assign('err_msg3', $list['2']);
$smarty->assign('err_msg4', $list['3']);
$smarty->assign('data', $data);

//テンプレートの設定
$smarty->display('stest_4_2.tpl');

?>


