<?php
require_once('Smarty.class.php');
$smarty = new Smarty();

//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';

//初期データを設定
$dataArr = array(
'item_name' =>'',
'price' =>'',
'pic' =>''
);

//エラーメッセージの配列作成
$errArr = array();
foreach($dataArr as $key => $value){
	$errArr[$key] = '';
}
	$smarty->assign('dataArr ', $dataArr);
	$smarty->assign('errArr ', $errArr);
	$smarty->display('/Applications/MAMP/htdocs/smarty/templates/item/regist.tpl');
?>