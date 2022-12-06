<?php
require_once('Smarty.class.php');
require_once('Database.class.php');
require_once('initMaster.class.php');
require_once('Common.class.php');
require_once('conf.php');

$smarty = new Smarty();
$db       = new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$common = new Common();

//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';

//モード判定(どの画面から来たかの判断)
//登録画面から来た場合
if(isset($_POST["confirm"]) === true ) $mode = "confirm";
//戻る場合
if(isset($_POST["back"]) ==true) $mode ="back";

//登録完了
if(isset($_POST["complete"]) === true )$mode = "complete";


//ボタンのモードよって処理をかえる
switch($mode){
	case "confirm"://新規登録
	//データを受け継ぐ
	//↓この情報は入力には必要ない
	unset($_POST["confirm"]);
	
	$dataArr =$_POST;
	//この値を入れないでPOSTするとUndefindedとなるので未定義の場合は空白状態としてセットしておく
	if(isset($_POST['sex']) === false) $dataArr['sex'] = "";
	if(isset($_POST['traffic']) === false) $dataArr['traffic'] = array() ;

//エラーメッセージの配列作成
$errArr = $common->errorCheck($dataArr);
$err_check = $common->getErrorFlg();

//err_check = false ->エラーがありますよ!
//err_check = true  ->エラーがないですよ!
//エラー無ければconfirm.tpl あるとrefist.tpl
$template = ($err_check === true )?'/Applications/MAMP/htdocs/smarty/templates/member/confirm.tpl':'/Applications/MAMP/htdocs/smarty/templates/member/regist.tpl';

break;

case "back";//戻ってきた時
//ポストされたデータを元に戻すので、$dataArrにいれる
$dataArr = $_POST;

unset ($dataArr["back"]);

//エラーも定義しておかないと,Undefinedエラーがでる
foreach($dataArr as $key => $value){
	$errArr[$key] = "";
}
$template ="/Applications/MAMP/htdocs/smarty/templates/member/regist.tpl";
break;

case "complete"://登録完了
 $dataArr = $_POST;
	
	//↓この情報はいらないので外しておく
	unset($dataArr["complete"]);
	$column =' ';
	$insData =' ';
	 
	 //foreachの中でSQl文を作る
	 foreach($dataArr as $key => $value){
	 	$column .= $key .", ";
	 	if($key === 'traffic' )$value = implode('_' , $value);
		$insData .= ($key ==='sex')?$db->quote($value).',':$db->str_quote($value) .','; 
	 }
	 
	 $query = "INSERT INTO member ("
	 . $column
	 ." regist_date "
	 .")VALUES("
	 . $insData
	." NOW() "
	.")";
	var_dump($query);
	$res = $db->execute($query);
	$db->close();
	
	if($res === true){
		//登録成功時は完成ページへ
		header("Location: http://localhost:8888/test/kanri/smarty/member/complete.php");
		exit;
	}else{
		//登録失敗時は登録画面に戻る
		$template = "/Applications/MAMP/htdocs/smarty/templates/member/regist.tpl";
		foreach($dataArr as $key => $value){
			$errArr[$key] = "";
		}
	}
	break;
}
//HTMLエスケープ
	$common ->htmlEncode($dataArr);
	
	$sexArr = initMaster::getSex();
	$trafficArr = initMaster:: getTrafficWay();
	$smarty->assign('sexArr' , $sexArr);
	$smarty->assign('trafficArr', $trafficArr);
	
	list($yearArr,$monthArr, $dayArr) = initMaster::getDate();
	$smarty->assign("yearArr" , $yearArr);
	$smarty->assign("monthArr", $monthArr);
	$smarty->assign("dayArr" , $dayArr);
	
	$smarty->assign('selectYear', $dataArr["year"]);
	$smarty->assign('selectMonth' , $dataArr["month"]);
	$smarty->assign('selectDay', $dataArr["day"]);
	$smarty->assign('selectSex', $dataArr["sex"]);
	$smarty->assign('selectTraffic', $dataArr["traffic"]);
	
	$smarty->assign("dataArr", $dataArr);
	$smarty->assign("errArr", $errArr);
	
	$smarty->display($template);
		
?>


