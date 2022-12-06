<?php
require_once('conf.php');
require_once('class/PDODatabase.class.php');
require_once('class/Session.class.php');
require_once('class/Item.class.php');
require_once('Smarty.class.php');


$smarty = new Smarty();
$db       = new PDODatabase(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_TYPE);
$ses     = new Session($db);
$itm     =  new Item($db);
//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates/shopping';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c/shopping';
echo "こんにちは" . $_SESSION['user_id'] ."さん";

//SessionKeyを見て,DBへの登録状態」をチェックする

$ses->checkSession();
//var_dump($_SESSION);
$ctg_id = (isset($_GET['ctg_id']) === true && preg_match('/^[0-9]+$/',$_GET['ctg_id']) ===1) ?$_GET['ctg_id'] :'';

//検索ワード
$word_first = (isset($_POST['word']) === true)? $_POST['word']:'';

$word = '%'.$word_first.'%';

if(isset($_POST['word']) === true){
//検索ワード
$word_first = (isset($_POST['word']) === true)? $_POST['word']:'';
$word = '%'.$word_first.'%';	
//検索結果
$dataArr = $itm->getItemLookData($word);
}else{
$dataArr = $itm->getItemList($ctg_id);
	
}

//カテゴリーリスト(一覧)を取得する
$cateArr = $itm->getCategoryList();

$smarty->assign("word", $word_first);	
$smarty->assign("cateArr", $cateArr);	
$smarty->assign("dataArr", $dataArr);	
$smarty->display('/Applications/MAMP/htdocs/smarty/templates/shopping/list.tpl');
?>
