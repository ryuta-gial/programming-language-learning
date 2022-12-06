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
	 ." item_id, "
	 ." item_name, "
	 ." price, "
	 ." pic, "
	 ." regist_date  "
	 ."FROM "
	 ." item ";
	$dataArr = $db->select($query);
	$db->close();	
	$smarty->assign("dataArr", $dataArr);	
	$smarty->display('/Applications/MAMP/htdocs/smarty/templates/item/list.tpl');

?>