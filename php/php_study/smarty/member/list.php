<?php
require_once('Smarty.class.php');
require_once('Database.class.php');
require_once('conf.php');

$smarty = new Smarty();
$db       = new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';


	 $query = "SELECT " 
	 ." mem_id, "
	 ." family_name, "
	 ." first_name, "
	 ." family_name_kana, "
	 ." first_name_kana, "
	 ." sex, "
	 ." email, "
	 ." traffic, "
	 ." regist_date  "
	 ."FROM "
	 ." member ";
	$dataArr = $db->select($query);
	$db->close();	
	$smarty->assign("dataArr", $dataArr);	
	$smarty->display('/Applications/MAMP/htdocs/smarty/templates/member/list.tpl');
		
?>


