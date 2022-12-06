<?php
require_once('Smarty.class.php');
require_once('Database.class.php');
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

//編集
if(isset($_POST["up_confirm"]) === true )$mode = "up_confirm";

//編集
if(isset($_POST["up_complete"]) === true )$mode = "up_complete";

//ボタンのモードよって処理をかえる
switch($mode){
    case "up_confirm"://編集登録
	//データを受け継ぐ
	//↓この情報は入力には必要ない
	unset($_POST["up_confirm"]);
	
    // 許可するMIMETYPE
        //var_dump($_POST);
        
if($_FILES['pic']['size'] > 0){
$upfile = $_FILES['pic'];
//var_dump($upfile);
 if ($upfile['error'] > 0) {
        throw new Exception('ファイルアップロードに失敗しました。');
    }
    
$tmp_name = $upfile['tmp_name'];
// ファイルタイプチェック
$finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $tmp_name);

    // 許可するMIMETYPE
    $allowed_types = array(
        'jpg' => 'image/jpeg'
        , 'png' => 'image/png'
        , 'gif' => 'image/gif'
    );
    if (!in_array($mimetype, $allowed_types)) {
        throw new Exception('許可されていないファイルタイプです。');
    }
     // ファイル名（ハッシュ値でファイル名を決定するため、同一ファイルは同盟で上書きされる）
    $filename = sha1_file($tmp_name);

    // 拡張子
    $ext = array_search($mimetype, $allowed_types);

    // 保存作ファイルパス
    $destination = sprintf('%s/%s.%s'
        , 'upload'
        , $filename
        , $ext
    );
 
     // アップロードディレクトリに移動
    if (!move_uploaded_file($tmp_name, $destination)) {
        throw new Exception('ファイルの保存に失敗しました。');
    }
$dataArr =$_POST;
$id = $_GET["item_id"];
$dataArr["pic"] = $destination;
$dataArr["item_id"] = $id;
}else{
$dataArr =$_POST;
$id = $_GET["item_id"];
$dataArr["item_id"] = $id;
}
//エラーメッセージの配列作成
$errArr = $common->errorCheck($dataArr);
$err_check = $common->getErrorFlg();

//err_check = false ->エラーがありますよ!
//err_check = true  ->エラーがないですよ!
//エラー無ければconfirm.tpl あるとrefist.tpl
$template = ($err_check === true )?'/Applications/MAMP/htdocs/smarty/templates/item/up_confirm.tpl':'/Applications/MAMP/htdocs/smarty/templates/item/regist.tpl';

break;

    
    
	case "confirm"://新規登録
	//データを受け継ぐ
	//↓この情報は入力には必要ない
	unset($_POST["confirm"]);
	
    // 許可するMIMETYPE
       //var_dump($_POST);
        
        
        //var_dump($_FILES['pic']);
if($_FILES['pic']['size'] > 0){
$upfile = $_FILES['pic'];
//var_dump($upfile);
 if ($upfile['error'] > 0) {
        throw new Exception('ファイルアップロードに失敗しました。');
    }
    
$tmp_name = $upfile['tmp_name'];
// ファイルタイプチェック
$finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $tmp_name);

    // 許可するMIMETYPE
    $allowed_types = array(
        'jpg' => 'image/jpeg'
        , 'png' => 'image/png'
        , 'gif' => 'image/gif'
    );
    if (!in_array($mimetype, $allowed_types)) {
        throw new Exception('許可されていないファイルタイプです。');
    }
     // ファイル名（ハッシュ値でファイル名を決定するため、同一ファイルは同盟で上書きされる）
    $filename = sha1_file($tmp_name);

    // 拡張子
    $ext = array_search($mimetype, $allowed_types);

    // 保存作ファイルパス
    $destination = sprintf('%s/%s.%s'
        , 'upload'
        , $filename
        , $ext
    );
 
     // アップロードディレクトリに移動
    if (!move_uploaded_file($tmp_name, $destination)) {
        throw new Exception('ファイルの保存に失敗しました。');
    }
$dataArr =$_POST;

$dataArr["pic"] = $destination;
}else{

$dataArr =$_POST;


}
//エラーメッセージの配列作成
$errArr = $common->errorCheck($dataArr);
$err_check = $common->getErrorFlg();

//err_check = false ->エラーがありますよ!
//err_check = true  ->エラーがないですよ!
//エラー無ければconfirm.tpl あるとrefist.tpl
$template = ($err_check === true )?'/Applications/MAMP/htdocs/smarty/templates/item/confirm.tpl':'/Applications/MAMP/htdocs/smarty/templates/item/regist.tpl';

break;

case "back";//戻ってきた時
//ポストされたデータを元に戻すので、$dataArrにいれる
$dataArr = $_POST;

unset ($dataArr["back"]);

//エラーも定義しておかないと,Undefinedエラーがでる
foreach($dataArr as $key => $value){
	$errArr[$key] = "";
}
$template ="/Applications/MAMP/htdocs/smarty/templates/item/regist.tpl";
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
		$insData .=$db->str_quote($value) .','; 
	 }
	 
	 $query = "INSERT INTO item ("
	 . $column
	 ." regist_date "
	 .")VALUES("
	 . $insData
	." NOW() "
	.")";
	$res = $db->execute($query);
	
	
	var_dump($query);
	
	
	
	$db->close();
	
	if($res === true){
		//登録成功時は完成ページへ
		header("Location: http://localhost:8888/test/kanri/smarty/item/complete.php");
		exit;
	}else{
		//登録失敗時は登録画面に戻る
		$template = "/Applications/MAMP/htdocs/smarty/templates/item/regist.tpl";
		foreach($dataArr as $key => $value){
			$errArr[$key] = "";
		}
	}
	break;
	
case "up_complete"://登録完了
$id = $_GET["item_id"];
//var_dump($id);
 $dataArr = $_POST;
	//↓この情報はいらないので外しておく
	unset($dataArr["up_complete"]);
	$updata =array();
	 //foreachの中でSQl文を作る
	 foreach($dataArr as $key => $value){
	 	$updata[] = $key ."=". $db->str_quote($value) ;
	 }
	 
	 //var_dump($updata);
	 $preSt = implode(",", $updata);
	 $query = "UPDATE item "
	 . " SET "
	 . $preSt ."," 
	 ." regist_date = NOW()"
	 ." WHERE "
	 ." item_id  =". $id ;
	
	$res = $db->execute($query);
	$db->close();
	
	if($res === true){
		//登録成功時は完成ページへ
		header("Location: http://localhost:8888/test/kanri/smarty/item/complete.php");
		exit;
	}else{
		//登録失敗時は登録画面に戻る
		$template = "/Applications/MAMP/htdocs/smarty/templates/item/regist.tpl";
		foreach($dataArr as $key => $value){
			$errArr[$key] = "";
		}
	}
	break;

	
}
//HTMLエスケープ
	$common ->htmlEncode($dataArr);
	
	$smarty->assign("dataArr", $dataArr);
	$smarty->assign("errArr", $errArr);
	
	$smarty->display($template);
		
?>


