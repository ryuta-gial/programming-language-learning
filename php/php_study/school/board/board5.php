<?php

require_once('Smarty.class.php');
require_once('Database.class.php');
require_once('config.php');

$smarty = new Smarty();
$db     = new Database(DB_HOST , DB_USER , DB_PASS , DB_NAME);
//テンプレートディレクトリ設定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';

$msg ='';
$err_msg ='';
if(isset($_POST['send']) ===true ){

	$name = $_POST['name'];
	$contents = $_POST['contents'];

	if($name != '' && $contents !==''){
		$query = "INSERT INTO board("
			." name,"
			."contents"
			.")VALUES("
			. $db->str_quote($name ).","
			. $db->str_quote($contents)
			.")";
		$res = $db->execute( $query );
		if($res !== false){
			$msg = '書き込みに成功しました';	
		}else{
			$err_msg = '書き込みに失敗しました';
		}
	}else{
	$err_msg = '名前とコメントを記入してください';
	}
	}
$query = "SELECT "
	."id,"
	."name,"
	."contents "
	."FROM"
	." board";
$data = $db->select($query);

$db->close();
//変数の設定
$smarty->assign('msg', $msg);
$smarty->assign('err_msg', $err_msg);
$smarty->assign('data', $data);

//テンプレートの設定
$smarty->display('board5.tpl');

?>
