<?php
require_once('conf.php');
require_once('class/PDODatabase.class.php');
require_once('class/Session.class.php');
require_once('class/Item.class.php');
require_once('Smarty.class.php');

$smarty = new Smarty();
$db       = new PDODatabase(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_TYPE);
$ses     = new Session($db);
$itm     =  new Item($db);

//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates/shopping';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c/shopping';

	 //セッションに、セッションIDを設定する
	$ses->checkSession();
	//item_idを取得する
	$item_id = (isset($_GET['item_id']) === true && preg_match('/^\d+$/', $_GET['item_id'])=== 1)? $_GET['item_id'] : '';

	//item_idが取得できていない場合、商品一覧へ遷移される
	if($item_id ==='')header('Location:http://localhost:8888/test/kanri/smarty/shopping/list.php');

	//カテゴリーリスト(一覧)を取得する
	$cateArr = $itm->getCategoryList();

	//商品情報を取得する
	$itemData = $itm->getItemDetailData($item_id);
	$smarty->assign("cateArr", $cateArr);
	$smarty->assign("itemData", $itemData[0]);//なぜ0が必要かは、$itemDataをvar_dumpしてみよう!
	$smarty->display('/Applications/MAMP/htdocs/smarty/templates/shopping/detail.tpl');
?>