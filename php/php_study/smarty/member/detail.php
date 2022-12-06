<?php
require_once('Smarty.class.php');
require_once('Database.class.php');
require_once('conf.php');

$smarty = new Smarty();
$db       = new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';


if(isset($_GET["mem_id"]) === true  && $_GET['mem_id'] !==''){
	 $mem_id =  $_GET['mem_id'];
	 	$query = "SELECT "
	 	." mem_id,"
	 	." family_name,"
	 	." first_name,"
	 	." family_name_kana,"
	 	." first_name_kana,"
	 	." sex,"
	 	." year,"
	 	." month,"
	 	." day,"
	 	." zip1,"
	 	." zip2,"
	 	." address,"
	 	." email,"
	 	." tel1,"
	 	." tel2,"
	 	." tel3,"
	 	." traffic,"
	 	." contents,"
	 	." regist_date "
	 	." FROM "
	 	." member "
	 	." WHERE "
	 	." mem_id = " . $db->quote($mem_id);
	 	$data = $db->select($query);
	 	$db->close();
	 	$dataArr = ($data !== "" && $data !== array() ) ? $data[0] :'';
	 	
	 	$dataArr['traffic' ] = explode('_' ,$dataArr['traffic']);
	 	
	 	
	$smarty->assign("dataArr" , $dataArr);	
	$smarty->display('/Applications/MAMP/htdocs/smarty/templates/member/detail.tpl');
}else{
header('Location: http://localhost:8888/test/kanri/smarty/member/complete.php');
exit();
}
?>


