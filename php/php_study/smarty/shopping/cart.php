<?php
require_once('conf.php');
require_once('class/PDODatabase.class.php');
require_once('class/Session.class.php');
require_once('class/Cart.class.php');
require_once('Smarty.class.php');

$smarty = new Smarty();
$db       = new PDODatabase(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_TYPE);
$ses     = new Session($db);
$cart     =  new Cart($db);

//セッションに、セッションIDを設定する
$ses->checkSession();
//var_dump($_SESSION);
$customer_no = $_SESSION['customer_no'];

//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates/shopping';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c/shopping';

		
	//item_idを取得する
	$item_id = (isset($_GET['item_id']) === true && preg_match('/^\d+$/', $_GET['item_id']) === 1)? $_GET['item_id']: '';
	$crt_id = (isset($_GET['crt_id']) === true && preg_match('/^\d+$/', $_GET['crt_id'])===1)? $_GET['crt_id'] : '';
	//var_dump($item_id);
	//item_idが設定されていれば、ショッピングカートに登録する
	if($item_id !==''){
		$res = $cart->insCartData($customer_no, $item_id);
		//var_dump($res);
		//登録に失敗した場合、エラーページを表示する
		if($res === false){
			echo "商品購入に失敗しました";
			exit();
		}
		}
		
	//crt_idが設定されていれば、削除する
	if($crt_id !==''){
		$res = $cart->delCartData($crt_id);
	}
	//カート情報を取得する
	$dataArr = $cart->getCartData($customer_no);
	//アイテム数と合計金額を取得する。listは配列をそれぞれの変数にわける
	//$cartSumAndNumData =$cart->getItemAndSumprice($customer_no);
	list($sumNum, $sumPrice) = $cart->getItemAndSumPrice($customer_no
	);
	//var_dump($dataArr);
	$smarty->assign("dataArr", $dataArr);
	$smarty->assign("sumNum", $sumNum);
	$smarty->assign("sumPrice", $sumPrice);
	$smarty->display('/Applications/MAMP/htdocs/smarty/templates/shopping/cart.tpl');
?>