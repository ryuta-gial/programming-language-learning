<?php
require_once('Smarty.class.php');
require_once('Database.class.php');
require_once('conf.php');

$smarty = new Smarty();
$db       = new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';


if(isset($_GET["item_id"]) === true  && $_GET['item_id'] !==''){
	 $item_id =  $_GET['item_id'];
	 	$query = "SELECT "
	 	." item_id,"
	 	." item_name,"
	 	." price,"
	 	." pic,"
	 	." regist_date "
	 	." FROM "
	 	." item "
	 	." WHERE "
	 	." item_id = " . $db->quote($item_id);
	 	$data = $db->select($query);
	 	$db->close();
	 	$dataArr = ($data !== "" && $data !== array() ) ? $data[0] :'';
	 	
	 	
	$smarty->assign("dataArr" , $dataArr);	
	$smarty->display('detail.tpl');
}else{
header('Location: http://localhost/item/list.php');
exit();
}
?>


