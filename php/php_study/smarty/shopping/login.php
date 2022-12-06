<?php
require_once('conf.php');
require_once('class/PDODatabase.class.php');
require_once('class/Session.class.php');
require_once('class/Login.class.php');
require_once('Smarty.class.php');

$smarty = new Smarty();
$db       = new PDODatabase(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_TYPE);
$ses     = new Session($db);
$login     = new Login($db);
//テンプレート指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates/shopping';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c/shopping';
$ses->checkSession();
$err_msg1 ='';
$err_msg2 ='';

$id = (isset($_POST['id'])=== true)?$_POST['id']:'';
$pw = (isset($_POST['pw'])=== true)?$_POST['pw']:'';

if(isset($_POST["send"]) === true ){

	if($id === '')$err_msg1 ='IDを入力してください';
	if($pw=== '')$err_msg2 ='PWを入力してください';

	if($err_msg1 ==='' && $err_msg2 ==='' )
	{
		$res = $login->checkLogin($id,$pw);
		if($res !== false && count($res)!== 0){
			$_SESSION['user_id'] = $_POST['id'];
			//var_dump($_SESSION['user_id']);
			header('Location:http://localhost/test/kanri/smarty/shopping/list.php');
			exit();
			//echo"ログイン成功";
		}else{
			
		echo "ログインに失敗しました。IDかPWを確認してください<br/>";
		}
	}
		//$_SESSION['userid'] = $_POST['userid'];
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
ログイン画面です<br/>
<form method="POST" action="" >
ID<br/>
<input type="text" name="id" value=""><br/>
<?php echo $err_msg1 ."<br/>" ?>
PW<br/>
<input type="password" name="pw" value=""><br/>
<?php echo $err_msg2 ."<br/>" ?>

<input type="submit" name="send" value="クリック">  
</body>
</html>
